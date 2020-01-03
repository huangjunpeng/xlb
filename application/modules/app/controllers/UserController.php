<?php
class UserController extends XlbController
{
    /**
     * 获取孩子接口列表
     */
    public function childrenListAction() {
        $list = XlbUserChildrenModel::getInstance()->getChildrenListByUid($this->uid);
        foreach ($list as &$value) {
            $time = strtotime($value['brithday']);
            $time = time() - $time;
            $year = floor($time / 60 / 60 / 24 / 365);
            $time -= $year * 60 * 60 * 24 * 365;
            $month = floor($time / 60 / 60 / 24 / 30);
            $value['age'] = $year.'岁'.$month.'个月';
        }
        $this->xlb_ret(1,'',$list);
    }

    /**
     * 添加编辑孩子接口
     */
    public function childrenAddAction() {
        $children = array();
        $nickname = $this->_getParam('nickname');
        if (!empty($nickname)) {
            $children['uc_nickname'] = $nickname;
        } else {
            $this->xlb_ret(0,'昵称不能为空');
        }
        $brithday = $this->_getParam('brithday');
        if (!empty($brithday)) {
            $children['uc_brithday'] = $brithday;
        }
        $sex = (int)$this->_getParam('sex');
        if (!empty($sex)) {
            $children['uc_sex'] = $sex;
        }
        $xlbm = XlbUserChildrenModel::getInstance();
        $id = $this->_getParam('id');
        if (empty($id)) {
            $children['u_id'] = $this->uid;
            $id = (int)$xlbm->addData($children);
            if ($id > 0) {
                $this->xlb_ret(1,'添加成功',['id' => $id]);
            } else {
                $this->xlb_ret(0,'添加失败');
            }
        } else {
            $ret = (int)$xlbm->editData($id,$children);
            if ($ret > 0) {
                $this->xlb_ret(1,'更新成功',['id' => $id]);
            } else {
                $this->xlb_ret(0,'更新失败');
            }
        }
    }

    /**
     * 删除孩子
     */
    public function childrenDelAction() {
        $id = $this->_getParam('id');
        if (empty($id)) {
            $this->xlb_ret(0, '孩子ID不能为空');
        }
        $xlbm = XlbUserChildrenModel::getInstance();
        $ret = (int)$xlbm->delData($id);
        if ($ret > 0) {
            $this->xlb_ret(1,'删除成功',['id' => $id]);
        } else {
            $this->xlb_ret(0,'删除失败');
        }
    }

    /**
     * 图书列表
     */
    public function bookListAction()
    {
        //获取当前页
        $page       = (int)$this->_getParam('page', 1);
        //获取每页数量
        $pagenum    = (int)$this->_getParam('pagenum', 20);
        //获取书状态: 1：可借阅、2：借阅中
        $status     = (int)$this->_getParam('status', 1);
        //获取经度
        $long       = empty((double)$this->_getParam('long')) ? 0 : (double)$this->_getParam('long');
        //获取纬度
        $lat        = empty((double)$this->_getParam('lat')) ? 0 : (double)$this->_getParam('lat');
        $bvm = XlbBookViewModel::getInstance();
        $ret = $bvm->listData(
            ($page - 1) * $pagenum,
            $pagenum,
            $status,
            $long,
            $lat
        );
        $this->xlb_ret(1, '', $ret);
    }

    /**
     * 上传文件
     */
    public function uploadAction()
    {
        if ($this->getRequest()->isPost()) {
            $upload = new Upload();
            /*设置附件上传根目录*/
            $upload->rootPath = XLB_WEB_ROOT;
            /*设置附件上传子目录*/
            $upload->savePath = XLB_UPLOAD.DIRECTORY_SEPARATOR;
            /*子目录创建方式屏蔽*/
            $upload->subName = array();
            $info =  $upload->upload();
            if (empty($info)) {
                $this->xlb_ret(0,'上传失败: '.$upload->getError());
            }
            $files = array();
            foreach ($info as $item) {
                $file['type'] = $item['type'];
                $file['name'] = $item['name'];
                $file['size'] = $item['size'];
                $file['path'] = $this->view->baseUrl().$item['savepath'].$item['savename'];
                $files[] = $file;
            }
            $this->xlb_ret(1,'', $files);
        }
    }

    /**
     * 修改用户昵称
     */
    public function xumAction() {
        $u_nickname =  $this->getParam('nickname', '');
        if (empty($u_nickname)) {
            $this->xlb_ret(0, '昵称不能为空');
        }
        if ($u_nickname == $this->user['u_nickname']){
            $this->xlb_ret(1, '修改成功');
        }
        $ret = XlbUserInfoModel::getInstance()
            ->editData($this->uid, array('u_nickname'=>$u_nickname));
        if ($ret <=0 ){
            $this->xlb_ret(0, '修改失败');
        }
        $this->xlb_ret(1, '修改成功');
    }

    /**
     * 修改用户头像
     */
    public function xupAction() {
        $upload = new Upload();
        /*设置附件上传根目录*/
        $upload->rootPath = XLB_WEB_ROOT;
        /*设置附件上传子目录*/
        $upload->savePath = XLB_UPLOAD.DIRECTORY_SEPARATOR.'user'.DIRECTORY_SEPARATOR;
        /*子目录创建方式屏蔽*/
        $upload->subName = array();
        $infos =  $upload->upload();
        if (empty($infos)) {
            $this->xlb_ret(0,'上传失败: '.$upload->getError());
        }
        $file = array();
        foreach ($infos as $key => $info) {
            $file = $info;
            break;
        }
        if (empty($file)) {
            $this->xlb_ret(0,'上传失败');
        }
        $savepath = $this->view->baseUrl().$file['savepath'].$file['savename'];
        $ret = XlbUserInfoModel::getInstance()
            ->editData($this->uid, array('u_picture'=>$savepath));
        if ($ret <=0 ){
            $this->xlb_ret(0, '修改失败');
        }
        $pic['type'] = $file['type'];
        $pic['name'] = $file['name'];
        $pic['size'] = $file['size'];
        $pic['path'] = $savepath;
        $this->xlb_ret(1,'', $pic);
    }

    /**
     * 获取用户信息
     */
    public function getinfoAction() {
        $row = XlbUserInfoModel::getInstance()
            ->getInfoById($this->uid);
        $this->xlb_ret(1, '', $row);
    }


    /**
     * 获取用户钱包
     */
    public function getwalletAction() {
        $row = XlbUserInfoModel::getInstance()
            ->getRowByID($this->uid);
        if (empty($row)) {
            $this->xlb_ret(0, '获取失败');
        }
        $row = $row->toArray();
        $row = $row[0];
        if (empty($row)) {
            $this->xlb_ret(0, '获取失败');
        }
        $wallet['deposit'] = $row['u_deposit'];
        $wallet['balance'] = $row['u_balance'];
        $this->xlb_ret(1, '', $wallet);
    }

    /**
     * 获取用户统计
     */
    public function xulAction() {
        $count = XlbUserInfoModel::getInstance()
            ->getUserCount($this->uid);
        $this->xlb_ret(1, '', $count);
    }

    /**
     * 消费、充值、押金、会员生成签名
     */
    public function signAction() {
        //订单类型
        $order_type = (int)$this->getParam('order_type', 0);
        if ($order_type === 0) {
            $this->xlb_ret(0, '订单类型不能为空');
        }
        $str_type = array(
            1 => '小萝卜消费支付',
            2 => '小萝卜充值支付',
            3 => '小萝卜押金支付',
            4 => '小萝卜会员支付'
        );

        if (!isset($str_type[$order_type])) {
            $this->xlb_ret(0, '订单类型错误');
        }

        if ($order_type == 3) {
            $amount = 49;
        } else {
            //金额
            $amount = (double)$this->getParam('amount', 0);
            if ($order_type != 1 && $order_type != 4 && empty($amount)) {
                $this->xlb_ret(0, '充值金额不能为空');
            }
        }

        if ($order_type == 1) {
            $order_no = $this->getParam('order_no');
            if (empty($order_no)) {
                $this->xlb_ret(0, '订单编号不能为空');
            }
            $_order = XlbOrderModel::getInstance()->getOrderByOrderNo($order_no, $order_type);
            if (empty($_order)) {
                $this->xlb_ret(0, '获取订单失败');
            }
            $amount = (double)$_order['order_amount_total'];
        } else {
            //充值、押金、会员生成订单
            $order_no = CabiController::build_order_no();

            $order = array(
                'order_type' => $order_type,
                'order_createtime' => time(),
                'u_id' => $this->uid,
                'order_subject' => $str_type[$order_type],
                'order_no' => $order_no,
                'order_amount_total' => $amount
            );

            if ($order_type == 4) {
                $mc_id = $this->getParam('mc_id', 0);
                if (empty($mc_id)) {
                    $this->xlb_ret(0, '会员卡ID不能为空');
                }
                $mc = XlbMemberCardModel::getInstance()->getById($mc_id);
                if (empty($mc)) {
                    $this->xlb_ret(0, '获取会员卡信息失败');
                }

                $mc['_price'] = 0.01;

                $order['mc_id'] = $mc_id;
                $order['order_amount_total'] = (double)$mc['_price'];
                $amount = (double)$mc['_price'];
            }


            //插入数据库
            $id = XlbOrderModel::getInstance()->insert($order);
            if ($id <=0 || empty($id) || $id === false) {
                $this->xlb_ret(0, '创建订单失败');
            }
        }



        //签名数组
        $sign_order = array(
            'body' => $order_type,
            'subject' => $str_type[$order_type],
            'total_amount' => $amount,
            'out_trade_no' => $order_no,

        );
        //生成签名
        $this->xlb_ret(1,'',
            array(
                'sign' => PayController::sign($sign_order)
            )
        );
    }

    /**
     * 余额支付
     */
    public function xubAction() {
        //金额
        $amount = (double)$this->getParam('total_amount');
        if (empty($amount)) {
            $this->xlb_ret(0, '支付金额不能为空');
        }

        //订单
        $order_no = $this->getParam('order_no');
        if (empty($order_no)) {
            $this->xlb_ret(0, '订单编号不能为空');
        }

        //获取订单信息
        $order = XlbOrderModel::getInstance()->getOrderByOrderNo($order_no, 1);
        if (empty($order)) {
            $this->xlb_ret(0, '获取用户订单失败');
        }

        //修改余额
        $u_balance = (double)$this->user['u_balance'];
        if ($amount > $u_balance) {
            $this->xlb_ret(0, '余额不足');
        }
        $u_balance = (double)$u_balance - (double)$amount;
        $m_user['u_balance'] = $u_balance;
        $ret = XlbUserInfoModel::getInstance()->editData($this->uid, $m_user);
        if ($ret != 1) {
            $this->xlb_ret(0, '支付失败');
        }

        //修改订单
        $m_order['order_paytime'] = time();
        $m_order['order_status']  = 1;
        $ret = XlbOrderModel::getInstance()
            ->editData((int)$order['order_id'], $m_order);
        if ($ret != 1) {
            $this->xlb_ret(0, '支付失败');
        }

        //支付记录
        $payrecord['record_pay_value'] = $amount;
        $payrecord['record_pay_date']  = time();
        $payrecord['record_pay_method'] = 1;
        $payrecord['u_id'] = $this->uid;
        $payrecord['order_id'] = $order_no;
        $payrecord['record_des'] = '余额支付';
        $payrecord['record_type'] = 2;
        XlbUserPayrecoryModel::getInstance()->insert($payrecord);

        $this->xlb_ret(1, '', $m_user);
    }

    /**
     * 获取订单列表接口
     */
    public function xolAction() {
        $_status    = $this->getParam('status', 0);
        if ($_status == 0) {
            $this->xlb_ret(0, '订单状态不能为空');
        }
        $page       = $this->getParam('page', 1);
        $pagenum    = $this->getParam('pagenum', 20);
        $rows       = XlbOrderModel::getInstance()
            ->getOrderListByStatus($page, $pagenum, $_status, $this->uid);
        foreach ($rows['rows'] as &$row) {
            $_time = $row['order_createtime'];
            $row['order_createtime'] = date('Y-m-d H:i:s', $_time);
            $_time = (int)$row['obd_returntime'];
            if ($_time != 0) {
                $row['obd_returntime'] = date('Y-m-d H:i:s', $_time);
            }
            else {
                $row['obd_returntime'] = null;
            }
        }
        $this->xlb_ret(1, '', $rows);

    }

    /**
     * 我的会员卡列表
     */
    public function xmlAction() {

        $user = XlbUserInfoModel::getInstance()->getRowByID((int)$this->uid);
        if (empty($user)) {
            self::write_log("获取用户信息失败");
        }
        $user = $user->toArray()[0];
        if ($user['u_type'] == 1) {
            $row = null;
        } else {
            $_time = (int)$user['u_vip_endtime'];
            $row['umc_endtime'] = date('Y年m月d日', $_time);
            $row['expired'] = $_time <= time() ? true : false;
        }
        $this->xlb_ret(1, '', $row);
    }

    /**
     * 退押金
     */
    public function xrmAction() {

        //获取用户押金
        $u_deposit = doubleval($this->user['u_deposit']);
        if ($u_deposit <= 0) {
            $this->xlb_ret(0, '未交押金');
        }

        $order = XlbOrderModel::getInstance()->getDepositOrderByUid($this->uid);
        if (empty($order)) {
            $this->xlb_ret(0, '获取押金订单失败');
        }

        //退款流程
        $response = PayController::refund($order['order_no'], $order['order_amount_total']);
        if ($response->msg != 'Business Failed') {
            XlbUserInfoModel::getInstance()->editData(
                (int)$this->uid,
                array('u_deposit'=>0)
            );

            XlbMessageModel::getInstance()->addMessage("押金",
                XlbMessageModel::$_sysmsg[XlbMessageModel::RETURN_DEPOSIT_MESSAGE],
                2,
                $this->uid
            );

            $this->xlb_ret(1, '退款成功');
        }
        else {
            $this->xlb_ret(0, '退款失败' . $response->sub_msg);
        }
    }

    /**
     * 交易明细
     */
    public function xplAction() {
        $page       = $this->getParam('page', 1);
        $pagenum    = $this->getParam('pagenum', 20);
        $rows       = XlbUserPayrecoryModel::getInstance()
            ->getPayList($page, $pagenum, 1);
        foreach ($rows['rows'] as &$row) {
            $_time = $row['record_pay_date'];
            $row['record_pay_date'] = date('Y-m-d H:i:s', $_time);
            $_type = $row['record_type'];
            $row['record_type'] = $_type == 1 ? '+' : '-';
        }
        $this->xlb_ret(1, '', $rows);
    }

    /**
     * 购买明细
     */
    public function xmrAction() {
        $page       = $this->getParam('page', 1);
        $pagenum    = $this->getParam('pagenum', 20);
        $rows       = XlbUserPayrecoryModel::getInstance()
            ->getMemberPayList($page, $pagenum, 1);
        foreach ($rows['rows'] as &$row) {
            $_time = $row['record_pay_date'];
            $row['record_pay_date'] = date('Y-m-d H:i:s', $_time);
            $_type = $row['record_type'];
            $row['record_type'] = $_type == 1 ? '+' : '-';
        }
        $this->xlb_ret(1, '', $rows);
    }

    /**
     * 我的消息
     */
    public function umlAction() {
        $page       = $this->getParam('page', 1);
        $pagenum    = $this->getParam('pagenum', 20);
        $status     = (int)$this->_getParam('type', 1);
        $rows       = XlbMessageModel::getInstance()
            ->getMessageByuid($this->uid, $status, $page, $pagenum);
        foreach ($rows['rows'] as &$row) {
            $row['m_creattime'] = date('Y-m-d H:i:s', $row['m_creattime']);
        }
        $this->xlb_ret(1, '', $rows);
    }

    /**
     * 设置我的消息已读
     */
    public function umrAction() {
        $id  = $this->getParam('id', 0);
        if (empty($id)) {
            $this->xlb_ret(0, "消息id不能为空");
        }
        $ret = XlbMessageModel::getInstance()->setRead($id);
        $this->xlb_ret(1, '设置成功', $ret);
    }
}