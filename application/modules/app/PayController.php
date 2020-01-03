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
        'merchant_private_key' => "MIIEowIBAAKCAQEAt7TckdACN+jka3GhiUV2+v6rD1abgKlpBms1ncKmSR3A3jp06ztlmLn8GvgQoAXcSedNNK5JK4t5VsyqU64N0Y1tvzSjJ/RRyn5O2PlxtQ5VVkiX18zWb4HaBNkEjXiDlaVc8GGEH76DtKe++ax//0guLb7qeruZLmts7qYtL8gSEUVE77gSgh4RO9ffna+YioUocg4/yNYZjsWwxBwxQxzztI74yf3+UdjX5r5Y96ahu3RRgWIG7ihdUan+HP1VsP/NdJOqnJBJMG/Aqj8dvu1V+y6UE6S6L7/KVnakKuy7WtBER8kMBqwIIzGoAJkiDVDghEYNbv2afZBE9pZM4wIDAQABAoIBAHMfhnJiNmGvMyYaCa8qtwtH+Q8dqUmR4N1C5lC9INQFL06Ut5yKlnqFYvXLqy99PLWbnAh9iCEfwKSikcLq+oHt7W67n9t0AqWxTdwvRhC+sL/nsjBsj51FdMlA7tdxRJTNElcZ5WC3VXYrAUUZ0wS5ySal0++iDLbIX3WW8g5UdKGDVSMW8SoDIzDHsEoHQMO5eKJ2MNN9D2pTfMIoIX5IrwADbc8nySx+vOZdglS2hWb7A5DKWFKTnCd6sCdAj/ySN+pWULnSwWurhlKWgqB4DKcDTSW/UFFvKpcbSJlTa7fn8iBEg0d1/mgdv9x3Q2L1Tk6YB1O7/0Ypfm26+RECgYEA5levRf7CE6T+R0h9LN2xeuEhIhPr6ogieuukCIZumFgOZITqWMKlzpYdY+Ltm+oCveLCILe4TgwRjsnWeAhqfWx0YDclVnP5ag7UinDJm6w/waNe4dpkypz82E6TYzPWDwNjkdsb/+PyLU+RngUQo97mw/vJPJHtONyQWLa/ShcCgYEAzCtUp5+EQwy4L0EKSFM2b0YeTCF6tm5nlKr3oDPGLvmhDtBiOsJunJbYJ6aNAOg8Ph6hcdOpZCFIRPSqjHBMPTofEI91kK7B3GLQEeV0VCPj3TpnMDdaGkdnlAGxUJHJFmkt0/7aukF1412UJWUkfMVt+wx38SQNdTmsIbXtLxUCgYAtwuXTZhVwiarqxn/31eNYojlO595KrdkLypzABNUb9wKE/dMA50rBjBkyqvbBru/0gYRHs7gt6T/juj2dgy6E1HMaWlpUnp3CcEfRaS7keogAFFDZVeYISsAAyTuGzdmNCgNSCtG5OLP4RIKNfjwcEkCOVwtXuTYDwe37cfL26QKBgE6NkVmY3yto9mh/7rPbCEORx9BkxTDxk3q4uONzaBnkw5nOhSy0aBhpVSsUQoYJ1DvWTylbVX4H7CVTuValUj/wX8lgWMxc4IupnQJ1tOc2k9InSVJcyZb4yBpC+HTWUncD6rT5BjDJRNFAzOICYyJ6V5FSv8cQpvjmQpsJwwLtAoGBAMHjPVGoUSrt4FjXqXlxjhLKGeUwba8VXs4UQPjWVzVqp6B3UoONizqtve/DvXTx1cupEIDidAugou2Jllu1FiR1M5VhefRAo+87aE8K0xZG8kuKyYu4HSBbqFZ1chUkGiI3Fgxr/y8c+jORxGMt0m5htbtX8aJgiTdBGPVd3FuW",

        //异步通知地址
        'notify_url' => "http://www.ixiaoluobo.com/xlb/pay/notify",

        //同步跳转
        'return_url' => "http://www.ixiaoluobo.com/xlb/pay/return",

        //编码格式
        'charset' => "UTF-8",

        //数据格式
        'json'=>'json',

        //签名方式
        'sign_type'=>"RSA",

        //支付宝网关
        'gatewayUrl' => "https://openapi.alipay.com/gateway.do",

        //支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
        'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAt7TckdACN+jka3GhiUV2+v6rD1abgKlpBms1ncKmSR3A3jp06ztlmLn8GvgQoAXcSedNNK5JK4t5VsyqU64N0Y1tvzSjJ/RRyn5O2PlxtQ5VVkiX18zWb4HaBNkEjXiDlaVc8GGEH76DtKe++ax//0guLb7qeruZLmts7qYtL8gSEUVE77gSgh4RO9ffna+YioUocg4/yNYZjsWwxBwxQxzztI74yf3+UdjX5r5Y96ahu3RRgWIG7ihdUan+HP1VsP/NdJOqnJBJMG/Aqj8dvu1V+y6UE6S6L7/KVnakKuy7WtBER8kMBqwIIzGoAJkiDVDghEYNbv2afZBE9pZM4wIDAQAB",
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