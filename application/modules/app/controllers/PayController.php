<?php
require_once XLB_WEB_ROOT.'/alipay/aop/AopClient.php';
require_once XLB_WEB_ROOT.'/alipay/aop/request/AlipayTradeAppPayRequest.php';
require_once XLB_WEB_ROOT.'/alipay/aop/request/AlipayTradeRefundRequest.php';
require_once XLB_WEB_ROOT.'/alipay/aop/SignData.php';
class PayController extends PublicController
{
    /**
     * 支付配置
     * @var array
     */
    static public $config =  array (
        //应用ID,您的APPID。
        'app_id' => "2018020102126413",

        //商户私钥
        'merchant_private_key' => "MIIEowIBAAKCAQEAyx+KEW95/VliCwn6eUq/PmD0M5l0QeaRDuJqi7qLS/hNipobpAVsy9f9z6/7hFvJ2jhL0hLDnjchRjHk2SporCmE1Bh0AXaB0gc3bhDzA0WXbIcv/oS67Lz7Ueo54kbH3d9Lz0mSoLugEqzO3ROG3jfrnoju/zIyeGacasVg6cAlGpDf++2RA2atDpgQfZ1okxLi9Cd1x5VbNFFAsqz7w3UQ3j+cm7cas0O1fzzQnAmu82T1RTaWNEJL/mPTb98lYnCEsRkNsadJlAnA3LLWcvqj4I14R9TDICR/cZSMVx27r/oukDaYDSWyA+5ZcKitHpMBAh6AWRpJgI3bmmi03QIDAQABAoIBAGtfEanjxpVgsU3qiWeiVnOP5qZ8AJNxYM6AaxfPlSCkccDJc8EBSSB73WPyv76Ykpvy1EmIt7UjqUgkybbuDwSqsdc30eKQFVHDlM5u0Tayi7fHwlwFJ5ZK04LakJyHE9G53qYFWyfx5kzY4kTEtK802i0kb0mg7ELu4tIh4ffNM8RrVdm2L3j/pmSRGcocVqXeJAwnBubJcE6oMWJzTO0AnxaelcJr4ctROBWNVDMT/IL8EU48vjtGD5wyCo6RFCbPaUTTBooq2OW5lRMOir5UjqO9anI18nv6iIagrKwZPcV5pMcrks9vWAVeWbauzZBJ+93V3YhaTbTi6KLMyJUCgYEA7c6gceFO/8B6cL37hAGJeNZoxqlZa742qUIOuemnwodAQuaabRn8wSZIXVryhPw1fknCZeeN+PiyH+baATt2iTu2kyjEDEAQTrnMvEEENDwyXJkwyscrkVzSecNwEJvhDT3nFIZ0ar+sqwRyyWbx6UXpaRHk4Y9EyRGS0ZyODNcCgYEA2qmjqhA26UsHQbcSqZdLBVIVwZ5wwlYK4YFmumeXDkT7LAOHvgu9aFQcY01FLRwCv3uZvBBLwngTLzN7MuTYy2MFlV3xWncsacJ6H+S3jfANvdBpBkUa0ArrLxc41Q1I+pGPE3/owEpQ9Qz1auPO/Ivoz5db59OCHce37+LXgWsCgYEA1XAAF1YWtntGKcyKYxeSEE+4aJ30sTxfCRlN6FUrifAkoCcjcUrCzYUTrB6FzxAi3v9KqHXkuhJUpUdoYXTCVjevDXOoSipxuIcQl+Ju6Ici2HNyFH4gv24lRr4/5dhSbLUjowtuj6ULT89FSzjHZQynivNRj5UsMp9APDwcTq8CgYBttOkBXSs/tz4H0YNShS7Fl56EyyqFxkelRpg0895M8X0XYxoK1rcMDg9EHzOS41fZnHjQa1inVDlD2E96hGjk+mSFwWFjYyFsWn+NWuJhG0y5rEPVOnyuXpwKv1rrQcQYu0kOnoE3YNHncL39CBkEimmfJbCdyneg22BEwgofywKBgAVKYE0wp5zZfi8/GpC5lvpif4epq/HtKxwTriWDOsDuxZq0uMqITADizAU6IYMyimy8Ry4N7XvrsLI+RgvHqn7V0XBvkdxURWBWjj1yhrtBix8a79YhW7/MNYLjxlUKk+8kXpPra0+zf6KBPnQwFwBZFO1IB7q4TywaHViEV/Pl",

        //异步通知地址
        'notify_url' => "http://www.ixiaoluobo.com/xlb/pay/notify",

        //同步跳转
        'return_url' => "http://www.ixiaoluobo.com/xlb/pay/return",

        //编码格式
        'charset' => "UTF-8",

        //数据格式
        'json'=>'json',

        //签名方式
        'sign_type'=>"RSA2",

        //支付宝网关
        'gatewayUrl' => "https://openapi.alipay.com/gateway.do",

        //支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
        'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA260+B9xzZi0p09UGWPULpCKeWq6/ZwGGxcMrNEKLLYZEAner2dAjCRY1vV/bf4MCdtpWmC0H0zChFTKu9O6BRZDGE54a7G5GaozlKh9bDJf095q3M1aR8HOUAS+hIShNtPiulPG9tain9ri0avQwrlBdWAg5QJnodaogMzl3u5t3xLH4iC+tWXbHHg/ihab611C77UgjcUrL6m647s0+JfhUvO2yymRKe7/7EdfaEf6JMPa7Q5oQxkD2M7/mgiRNxB1rbJt/HMtWFBANCxg6CIqCrT1rffXpQ/dWLJ3enxBVt4olUVungT/E2039GU/KmaS5HSo0cuemOgO6ldVhvwIDAQAB",
);

    /**
     * 获取支付信息
     */
    public function payAction() {
        //初始化数组
        $data = array();
        //获取商品
        $subject = $this->getParam('subject');
        if ("" == $subject) {
            $this->write_log('subject不能为空');
            $this->xlb_ret(0, 'subject不能为空');
        }
        $data['subject'] = $subject;
        //获取金额
        $total_amount = $this->getParam('total_amount');
        if ("" == $total_amount) {
            $this->write_log('金额不能为空');
            $this->xlb_ret(0, '金额不能为空');
        }
        $data['total_amount'] = $total_amount;
        //订单编号
        $order_no = $this->getParam('order_no');
        if("" == $order_no) {
            $this->write_log('商户订单ID不能为空');
            $this->xlb_ret(0, '商户订单ID不能为空');
        }
        //订单类型
        $order_type = $this->getParam('order_type');
        if (empty($order_type)) {
            $this->write_log('订单类型不能为空');
            $this->xlb_ret(0, '订单类型不能为空');
        }
        $data['body']               = $order_type;
        $data['out_trade_no']       = $order_no;

        //返回签名
        $this->xlb_ret(1,'', array('response'=>self::sign($data)));
    }

    /**
     * 生成签名
     * @param $data
     * @return string
     */
    static public function sign($data) {
        //填充数据
        $data['timeout_express']    = "30m";
        $data['product_code']       = "QUICK_MSECURITY_PAY";
        //初始化
        $aop = new AopClient;
        $aop->gatewayUrl            = self::$config['gatewayUrl'];
        $aop->appId                 = self::$config['app_id'];
        $aop->rsaPrivateKey         = self::$config['merchant_private_key'];
        $aop->format                = self::$config['json'];
        $aop->postCharset           = self::$config['charset'];
        $aop->signType              = self::$config['sign_type'];
        $aop->alipayrsaPublicKey    = self::$config['alipay_public_key'];
        //实例化具体API对应的request类,类名称和接口名称对应,当前调用接口名称：alipay.trade.app.pay
        $request = new AlipayTradeAppPayRequest();
        //设置异步通知
        $request->setNotifyUrl(self::$config['notify_url']);
        //设置内容
        $request->setBizContent(json_encode($data));
        //这里和普通的接口调用不同，使用的是sdkExecute
        $response = $aop->sdkExecute($request);
        self::write_log($response);
        return $response;
    }

    /**
     * 退款
     * @param $order_no
     * @param $order_amount_total
     * @return bool|SimpleXMLElement[]
     */
    static public function refund($order_no, $order_amount_total) {
        //初始化
        $aop = new AopClient;
        $aop->gatewayUrl            = self::$config['gatewayUrl'];
        $aop->appId                 = self::$config['app_id'];
        $aop->rsaPrivateKey         = self::$config['merchant_private_key'];
        $aop->format                = self::$config['json'];
        $aop->postCharset           = self::$config['charset'];
        $aop->signType              = self::$config['sign_type'];
        $aop->alipayrsaPublicKey    = self::$config['alipay_public_key'];
        $aop->apiVersion            = "1.0";


        $bizContentarr['trade_no']          = "";
        $bizContentarr['out_trade_no']      = $order_no;
        $bizContentarr['refund_amount']     = $order_amount_total;
        $bizContentarr['out_request_no']    = "";
        $bizContentarr['refund_reason']     = "";

        $request = new AlipayTradeRefundRequest();
        $request->setBizContent (json_encode($bizContentarr,JSON_UNESCAPED_UNICODE));

        $response = $aop->Execute($request);

        //打开后，将报文写入log文件
        self::write_log("response: ".var_export($response,true));
        $response = $response->alipay_trade_refund_response;
        return $response;
    }

    /**
     * 异步通知地址
     */
    public function notifyAction() {
        //初始化
        $aop = new AopClient();
        $arr = @$_POST;
        $aop->alipayrsaPublicKey = self::$config['alipay_public_key'];
        $result = $aop->rsaCheckV1($arr, self::$config['alipay_public_key'], self::$config['sign_type']);
        $this->write_log(var_export(@$_POST,true));
        if($result) {
            $this->write_log('校验成功');

            //order_type: 1:支付、2：充值、3：押金、4：会员卡
            //获取订单类型
            $order_type = (int)@$_POST['body'];

            //获取订单编号
            $order_no = @$_POST['out_trade_no'];

            XlbOrderModel::getInstance()->beginTransaction();

            //获取订单信息
            $order = XlbOrderModel::getInstance()->getOrderByOrderNo($order_no, $order_type);
            if (empty($order)) {
                self::write_log("获取用户订单失败");
                goto payend;
            }

            //获取支付状态
            if("TRADE_SUCCESS" != @$_POST['trade_status']){
                $this->write_log("支付失败");
                $m_order['order_status']  = 2;
                $ret = XlbOrderModel::getInstance()->editData((int)$order['order_id'], $m_order);
                self::write_log($ret);
                goto payend;
            }

            //修改订单状态
            self::write_log('修改订单状态');
            $m_order['order_paytime'] = time();
            $m_order['order_status']  = 1;
            $ret = XlbOrderModel::getInstance()->editData((int)$order['order_id'], $m_order);
            self::write_log($ret);

            $this->write_log(var_export(@$order,true));

            //获取用户信息
            self::write_log('获取用户信息');
            $user = XlbUserInfoModel::getInstance()->getRowByID((int)$order['u_id']);
            if (empty($user)) {
                self::write_log("获取用户信息失败");
                goto payend;
            }
            $user = $user->toArray()[0];
            $this->write_log(var_export(@$user,true));

            //支付记录
            $payrecord['record_pay_value'] = $order['order_amount_total'];
            $payrecord['record_pay_date']  = time();
            $payrecord['record_pay_method'] = 2;
            $payrecord['u_id'] = $order['u_id'];
            $payrecord['order_id'] = $order['order_id'];


            switch ($order_type)
            {
                case 1:
                    //支付成功
                    $payrecord['record_des'] = '借书消费';
                    $payrecord['record_type'] = 2;

                    break;
                case 2:
                    //充值成功，修改用户余额
                    {
                        $payrecord['record_des'] = '余额充值';
                        $payrecord['record_type'] = 1;

                        self::write_log('修改用户余额');
                        self::write_log((double)$user['u_balance']);
                        self::write_log((double)$order['order_amount_total']);
                        $u_balance = (double)$user['u_balance'] + (double)$order['order_amount_total'];
                        self::write_log($u_balance);
                        $ret = XlbUserInfoModel::getInstance()->editData(
                            (int)$order['u_id'],
                            array('u_balance'=>$u_balance)
                        );
                        self::write_log($ret);
                    }
                    break;
                case 3:
                    //押金成功，修改用户押金
                    {
                        $payrecord['record_des'] = '押金支付';
                        $payrecord['record_type'] = 1;

                        self::write_log('修改用户押金');
                        $u_deposit = (double)$order['order_amount_total'];
                        self::write_log($u_deposit);
                        $ret = XlbUserInfoModel::getInstance()->editData(
                            (int)$order['u_id'],
                            array('u_deposit'=>$u_deposit)
                        );
                        self::write_log($ret);
                    }
                    break;
                case 4:
                    //会员成功，修改用户会员到期时间，修改订单状态
                    {
                        $payrecord['record_des'] = '购买会员';
                        $payrecord['record_type'] = 2;

                        //获取会员卡
                        $mc_id = $order['mc_id'];
                        self::write_log($mc_id);
                        $mc = XlbMemberCardModel::getInstance()->getById($mc_id);
                        self::write_log(var_export($mc, true));
                        $_time = (int)$mc['_effective_time'] * 24 * 60 * 60;
                        self::write_log($_time);

                        $umc_begintime = (int)$user['u_vip_endtime'] > 0 ? (int)$user['u_vip_endtime'] : time();

                        $u_vip_endtime = $umc_begintime + $_time;
                        self::write_log($u_vip_endtime);

                        $data['u_vip_endtime'] = $u_vip_endtime;
                        if ($user['u_type'] == 1) {
                            $data['u_type'] = 2;
                        }

                        $ret = XlbUserInfoModel::getInstance()->editData(
                            (int)$order['u_id'],
                            $data
                        );
                        self::write_log($ret);
                        $umc['u_id'] = (int)$order['u_id'];
                        $umc['mc_id'] = $mc_id;
                        $umc['umc_begintime'] = $umc_begintime;
                        $umc['umc_endtime'] = $u_vip_endtime;

                        $ret = XlbUserMemberCard::getInstance()->insert($umc);
                        self::write_log($ret);

                        self::write_log('修改用户会员到期时间');
                    }
                    break;
            }
            XlbUserPayrecoryModel::getInstance()->insert($payrecord);
            XlbOrderModel::getInstance()->commit();
payend:
            XlbOrderModel::getInstance()->rollBack();
            echo "success";
        }else {
            $this->write_log('校验失败');
            echo "fail";
        }
        exit;
    }

    public function returnAction() {
        $this->write_log(var_export(@$_GET,true));
    }
}