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

        //获取数据库实例
        $xom = XlbOrderModel::getInstance();
        $xom->beginTransaction();

        //生成订单编号
        $order_no = self::build_order_no();

        //创建订单
        if ($this->createOrder($xom, $order_no) < 0) {
            $xom->rollBack();
            $this->xlb_ret(0, '开柜失败');
        }

        //创建订单详情
        if (($obd_id = $this->createOrderDetail($xom, $order_no, $bookinfo)) < 0) {
            $xom->rollBack();
            $this->xlb_ret(0, '开柜失败');
        }

        //修改格子状态
        if ($this->modifySpace($cs_id, array('cs_status'=>0)) === false) {
            $xom->rollBack();
            $this->xlb_ret(0, '开柜失败');
        }

        //修改共享绘本状态
        if ($this->modifyShare($bookinfo['sb_id'], array('sb_status'=>2)) == false) {
            $xom->rollBack();
            $this->xlb_ret(0, '开柜失败');
        }

        //开柜子
        $ret = $this->openAction((int)$bookinfo['cabi_id'], (int)$cs_id);
        if ($ret === false) {
            //更新订单详情
            XlbOrderBookDetailModel::getInstance()
                ->editData($obd_id, array('obd_status'=>0));
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
     * 开柜子操作
     * @param XlbOrderModel $xom
     * @param $order_no
     * @param $bookinfo
     */
    public function openAction($cabi_id, $cs_id) {
        //判断大端、小端
        define('BIG_ENDIAN', pack('L', 1) === pack('N', 1));

        //make cmd pack
        $cmd['distID'] = 2;
        $cmd['serviceId'] = md5(uniqid());
        $cmd['cabinet'] = $cabi_id;
        $cmd['lattice'] = $cs_id;
        $cmd['ctrl'] = 1;

        //make cmd json str
        $cmdstr = json_encode($cmd);
        $cmdlen = strlen($cmdstr);
        $pack = pack('s', $cmdlen);
        $pack .= $cmdstr;

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
        $buf = @socket_read($socket, 2, PHP_NORMAL_READ);
        $int = unpack('s', $buf);
        $short = $int[1];
        $ushort = ($short & 0xff) << 8 | ($short >> 8) & 0xff;
        $buff = @socket_read($socket, $ushort, PHP_NORMAL_READ);
        $res = json_decode($buff, true);
        $cabinet = $res['cabinet'];
        $lattice = $res['lattice'];
        $status  = $res['status'];
        $bookId  = $res['bookId'];
        if ($cabi_id == $cabinet && $cs_id == $lattice && $status == 2) {
            return $bookId;
        }
        return false;
    }
}