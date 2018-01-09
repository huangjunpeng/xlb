<?php
require_once XLB_WEB_ROOT.'/alipay/aop/AopClient.php';
require_once XLB_WEB_ROOT.'/alipay/aop/request/AlipayTradeAppPayRequest.php';
class PayController extends PublicController
{
    /**
     * 支付配置
     * @var array
     */
    protected $config =  array (
        //应用ID,您的APPID。
        'app_id' => "2017081608219300",

        //商户私钥
        'merchant_private_key' => "MIICdgIBADANBgkqhkiG9w0BAQEFAASCAmAwggJcAgEAAoGBALUwVOKMwxrakXPrkHcgkm/PQU57fhcHrm8Bpk40P0rt5MeIxKZALxq0DoPjo/LVS5O4rSz9JyYX0za3OJ7oahtFPZi6rPR3Q01cl+fmMBP73jnrTfICqnwL63+0FBAcqlH78bldb41gzBXI15RlieOtR863LyJyYbywYSgmEr67AgMBAAECgYB3THZnoIUKFmV07OJ2/XRNuCno0fjokv8wSebFUTNnU5GyK4RHbrVVIL756hXV2sjjX9Jub9SqCT/ho+vc/Wx2oo/2cbR5hylTgwEvRcNMwByQBcSKiLsMprxqcJGZyzqGDpp2IK68awXY46En+QzpTY5XTMwJhplwuOkigFc1SQJBANqw5gY6WiHKyACQ33pr2dHGFIvD1uZrVVphU/HsUzs02N4/mf9YJdCOxmXJOr9Woj4zk6vYVSz+RwkEqtxvqKUCQQDUGZAgGiPBDe5M3YtQPdTr1c5mBUEQ28PZz2jvoPgvPXMIxjA4q0Z/CgXXyWW1hmNG5LFxBE/yJEZf1QVNhMvfAkEAyobq77eYgxT9tfB01jYNSgVMP8eFPG0IZaQfDruStRETCngSUPQ8SPIAcIE0Y8CCjmJLjujQsNNny8VDytOpdQJAU/d+yEaw6uex9HosgerIlUjCej8QQDVQdrUWzO8D8ee417tmMbkUoox8Pa48dr2qJdG5sY1MfQcBWUUC4Wp2LwJACOB3tagm71PxClO2uTiLVB4aRo9v+TT8unle9Y2SxG/6cARMqxdbLPSyRt75BIQGskJueH1uyosb4oUDb2cuhA==",

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
        'alipay_public_key' => "MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDDI6d306Q8fIfCOaTXyiUeJHkrIvYISRcc73s3vF1ZT7XN8RNPwJxo8pWaJMmvyTn9N4HQ632qJBVHf8sxHi/fEsraprwCtzvzQETrNRwVxLO5jVmRGi60j8Ue1efIlzPXV9je9mkjzOmdssymZkh2QhUrCmZYI/FCEa3/cNMW0QIDAQAB",
    );

    /**
     * 获取支付信息
     */
    public function payAction() {
        //初始化
        $aop = new AopClient;
        $aop->gatewayUrl            = $this->config['gatewayUrl'];
        $aop->appId                 = $this->config['app_id'];
        $aop->rsaPrivateKey         = $this->config['merchant_private_key'];
        $aop->format                = $this->config['json'];
        $aop->charset               = $this->config['charset'];
        $aop->signType              = $this->config['sign_type'];
        $aop->alipayrsaPublicKey    = $this->config['alipay_public_key'];

        //实例化具体API对应的request类,类名称和接口名称对应,当前调用接口名称：alipay.trade.app.pay
        $request = new AlipayTradeAppPayRequest();
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
        $data['timeout_express']    = "30m";
        $data['product_code']       = "QUICK_MSECURITY_PAY";
        //设置异步通知
        $request->setNotifyUrl($this->config['notify_url']);
        //设置内容
        $request->setBizContent(json_encode($data));
        //这里和普通的接口调用不同，使用的是sdkExecute
        $response = $aop->sdkExecute($request);
        $this->write_log($response);
        $this->xlb_ret(1,'', array('response'=>$response));
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
            //获取订单类型
            $order_type = @$_POST['body'];
            //order_type: 1:借书、2充值
            if ($order_type == 1) {

            } else {

            }
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