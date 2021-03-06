<?php
class CabiController extends XlbController {
    /**
     * 生成订单编号
     * @return string
     */
    static public function build_order_no(){
        return date('Ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
    }

    /**
     * 还书
     */
    public function returnAction() {
        //获取订单ID
        $order_id = $this->getParam('order_id', 0);
        if ($order_id == 0) {
            $this->xlb_ret(0, '订单ID不能为空');
        }

        //获取柜子ID
        $cabi_id = $this->getParam('cabi_id', 0);
        if ($cabi_id == 0) {
            $this->xlb_ret(0, '柜子ID不能为空');
        }

        //获取空格子
        $rows = XlbCabispaceModel::getInstance()
            ->getCabispaceByCabiId($cabi_id, 0);
        if (empty($rows)) {
            $this->xlb_ret(0, '获取空格子失败');
        }
        $cs_id = $rows[0]['cs_id'];

        //修改格子状态
        $this->modifySpace($cs_id, array('cs_status'=>1));

        //获取订单信息
        $order = XlbOrderModel::getInstance()->getOrderById($order_id);
        $ret = $this->openCabi((int)$cabi_id, (int)$cs_id, 2);
        if ($ret === false) {
            //修改格子状态
            $this->modifySpace($cs_id, array('cs_status'=>0));
            $this->xlb_ret(0, '开柜失败');
        }
        //修改绘本订单状态
        $this->modifyOrderBookDetail((int)$order['obd_id'], array('obd_status'=>3, 'obd_returntime'=>time()));

        //修改共享绘本状态
        $this->modifyShare($order['sb_id'], array('sb_status'=>1));

        $this->xlb_ret(1, '开柜成功', $order);
    }

    /**
     * 借书
     */
    public function borrowAction() {
        //获取格子ID
        $cs_id = $this->getParam('cs_id');
        if (empty($cs_id)) {
            $this->xlb_ret(0, '格子ID不能为空');
        }
        //获取详情
        $bookinfo = XlbCabispaceModel::getInstance()->getInfoById($cs_id);
        if ($bookinfo['sb_status'] != 1) {
            $this->xlb_ret(0, '绘本不可借');
        }

        //获取数据库实例
        $xom = XlbOrderModel::getInstance();
        $xom->beginTransaction();

        //生成订单编号
        $order_no = self::build_order_no();

        //创建订单
        if ($this->createOrder($xom, $order_no) < 0) {
            $xom->rollBack();
            $this->xlb_ret(0, '开柜失败, errcode: 1');
        }

        //创建订单详情
        if (($obd_id = $this->createOrderDetail($xom, $order_no, $bookinfo)) < 0) {
            $xom->rollBack();
            $this->xlb_ret(0, '开柜失败, errcode: 2');
        }

        //修改格子状态
        if ($this->modifySpace($cs_id, array('cs_status'=>0)) === false) {
            $xom->rollBack();
            $this->xlb_ret(0, '开柜失败, errcode: 3');
        }

        //修改共享绘本状态
        if ($this->modifyShare($bookinfo['sb_id'], array('sb_status'=>2)) == false) {
            $xom->rollBack();
            $this->xlb_ret(0, '开柜失败, errcode: 4');
        }

        //开柜子
        $ret = $this->openCabi((int)$bookinfo['cabi_id'], (int)$cs_id, 1);
        if ($ret === false) {
            //更新订单详情
            XlbOrderBookDetailModel::getInstance()
                ->editData($obd_id, array('obd_status'=>0));
            $xom->rollBack();
            $this->xlb_ret(0, '开柜失败, errcode: 5');
        }
        $xom->commit();
        $this->xlb_ret(1, '开柜成功');
    }

    /**
     * 创建订单
     * @param XlbOrderModel $xom
     * @param $order_no
     * @return mixed
     */
    protected function createOrder(XlbOrderModel $xom, $order_no) {
        //添加订单
        $order = array();
        //订单编号
        $order['order_no'] = $order_no;
        //订单类型
        $order['order_type']    = 1;
        //订单创建时间
        $order['order_createtime'] = time();
        //用户
        $order['u_id'] = $this->uid;
        //订单主题
        $order['order_subject'] = '共享绘本支付';
        $order_id = $xom->insert($order);
        if ($order_id <=0 || $order === false) {
            $xom->rollBack();
            $this->xlb_ret(0, '创建订单失败');
        }
        return $order_id;
    }

    /**
     * 添加绘本订单详情
     * @param XlbOrderModel $xom
     * @param $order_no
     * @param $bookinfo
     * @return mixed
     */
    protected function createOrderDetail(XlbOrderModel $xom, $order_no, $bookinfo) {
        //添加绘本订单详情
        $obd = array();
        //订单编号
        $obd['order_no'] = $order_no;
        //绘本ID
        $obd['b_id'] = $bookinfo['b_id'];
        //共享绘本ID
        $obd['sb_id'] = $bookinfo['sb_id'];
        //格子ID
        $obd['cs_id'] = $bookinfo['cs_id'];
        //价格
        $obd['sb_share_price'] = $bookinfo['sb_share_price'];
        //状态
        $obd['obd_status'] = 2;
        //获取数据库模型
        $xobd = XlbOrderBookDetailModel::getInstance();
        $obd_id = $xobd->insert($obd);
        if ($obd_id <=0 || $obd_id === false) {
            $xom->rollBack();
            $this->xlb_ret(0, '创建订单失败');
        }
        return $obd_id;
    }

    /**
     * 修改格子
     * @param $cs_id
     * @param $array
     * @return bool
     */
    protected function modifySpace($cs_id, $array) {
        $ret = XlbCabispaceModel::getInstance()->editData($cs_id, $array);
        return $ret > 0 ? true : false;
    }


    /**
     * 修改绘本
     * @param $sb_id
     * @param $array
     * @return bool
     */
    protected function modifyShare($sb_id, $array) {
        $ret = XlbShareBookModel::getInstance()->editData($sb_id, $array);
        return $ret > 0 ? true : false;
    }

    /**
     * 修改订单绘本状态
     * @param $obd_id
     * @param $array
     * @return bool
     */
    protected function modifyOrderBookDetail($obd_id, $array) {
        $ret = XlbOrderBookDetailModel::getInstance()
            ->editData($obd_id, $array);
        return $ret > 0 ? true : false;
    }

    /**
     * 开柜子操作
     * @param $cabi_id
     * @param $cs_id
     * @param $event
     * @return bool
     */
    protected function openCabi($cabi_id, $cs_id, $event) {
        //判断大端、小端
        define('BIG_ENDIAN', pack('L', 1) === pack('N', 1));

        //make cmd pack
        $cmd['distID']      = 2;
        $cmd['serviceId']   = 0x1234;
        $cmd['cabinet']     = 0x12345;
        $cmd['lattice']     = 0x02;
        $cmd['event']       = $event;

        $cmdstr = json_encode($cmd);
        $pack  = $cmdstr;

        self::write_log($pack);

        //get server address
        $config = Zend_Registry::get('config');
        $tcpserver = $config->tcp->tcpserver;
        $tcpport = $config->tcp->tcpport;

        //connect server
        $socket = @socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        $con = @socket_connect($socket, $tcpserver, $tcpport);
        if(!$con) {
            @socket_close($socket);
            return false;
        }
        //send pack
        $nret = @socket_write($socket, $pack);
        if ($nret <= 0) {
            return false;
        }

        //recv pack
        //$buf = @socket_read($socket, 1024);
        //self::write_log($buf);

        //$res = json_decode($buf, true);
        //return $res;
        return true;
    }

    /**
     * 开柜
     * @param $cabi_id
     * @param $cs_id
     */
    public function openAction($cabi_id, $cs_id) {
        if (false === $this->openCabi($cabi_id, $cs_id, 2)) {
            $this->xlb_ret(0, '打开柜子失败');
        }
        $this->xlb_ret(1, '打开成功');
    }

    /**
     * 获取空格子列表
     */
    public function gecAction() {
        $_id = $this->getParam('id');
        if (empty($_id)) {
            $this->xlb_ret(0, '柜子ID不能为空');
        }
        $ret['casps'] = XlbCabispaceModel::getInstance()
            ->getCabispaceByCabiId($_id, 0);
        $this->xlb_ret(1,'',$ret);
    }

    /**
     * 获取近柜子列表
     */
    public function gclAction() {
        //获取经度
        $_long = (double)$this->_getParam('long');
        if (empty($_long)) {
            $this->xlb_ret(0, '经度不能为空');
        }

        //获取纬度
        $_lat  = (double)$this->_getParam('lat');
        if (empty($_lat)) {
            $this->xlb_ret(0, '纬度不能为空');
        }
        $rows = XlbCabinetModel::getInstance()
            ->getCabiList($_long, $_lat);
        $this->xlb_ret(1, '', $rows);
    }
}