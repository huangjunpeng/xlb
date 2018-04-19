<?php
require_once XLB_WEB_ROOT.'/alipay/aop/AopClient.php';
require_once XLB_WEB_ROOT.'/alipay/aop/request/AlipayTradeAppPayRequest.php';
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
        'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAyx+KEW95/VliCwn6eUq/PmD0M5l0QeaRDuJqi7qLS/hNipobpAVsy9f9z6/7hFvJ2jhL0hLDnjchRjHk2SporCmE1Bh0AXaB0gc3bhDzA0WXbIcv/oS67Lz7Ueo54kbH3d9Lz0mSoLugEqzO3ROG3jfrnoju/zIyeGacasVg6cAlGpDf++2RA2atDpgQfZ1okxLi9Cd1x5VbNFFAsqz7w3UQ3j+cm7cas0O1fzzQnAmu82T1RTaWNEJL/mPTb98lYnCEsRkNsadJlAnA3LLWcvqj4I14R9TDICR/cZSMVx27r/oukDaYDSWyA+5ZcKitHpMBAh6AWRpJgI3bmmi03QIDAQAB",
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
        $aop->charset               = self::$config['charset'];
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
     * 异步通知地址
     */
    public function notifyAction() {
        //初始化
        $aop = new AopClient;
        $aop->alipayrsaPublicKey = $this->config['alipay_public_key'];
        $result = $aop->rsaCheckV1(@$_POST, NULL, $this->config['sign_type']);
        $this->write_log(var_export(@$_POST,true));
        if($result) {
            $this->write_log('校验成功');
            if("TRADE_SUCCESS" != @$_POST['trade_status']){
                $this->write_log("支付失败");
                exit;
            }
            //获取订单编号
            $order_no = @$_POST['out_trade_no'];
            //获取订单信息
            $order = XlbOrderModel::getInstance()->getOrderByOrderNo($order_no);
            if (empty($order)) {
                self::write_log("获取用户订单失败");
            }
            //获取订单类型
            $order_type = (int)@$_POST['body'];
            //order_type: 1:借书、2充值
            if ($order_type == 2) {
                self::write_log('获取用户信息');
                $user = XlbUserInfoModel::getInstance()->getRowByID((int)$order['u_id']);
                if (empty($user)) {
                    self::write_log("获取用户信息失败");
                }
                self::write_log('修改用户余额');
                $u_balance = bcadd((double)$user['u_balance'], (double)$order['order_amount_total'], 2);
                self::write_log($u_balance);
                $ret = XlbUserInfoModel::getInstance()
                    ->editData((int)$order['u_id'], array('u_balance'=>$u_balance));
                self::write_log($ret);
            }
            self::write_log('修改订单状态');
            $m_order['order_paytime'] = time();
            $m_order['order_status']  = 1;
            $ret = XlbOrderModel::getInstance()->editData((int)$order['order_id'], $m_order);
            self::write_log($ret);
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