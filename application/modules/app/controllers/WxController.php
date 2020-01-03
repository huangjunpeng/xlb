<?php
require_once XLB_WEB_ROOT . '/wxpay/lib/WxPay.Api.php';
require_once XLB_WEB_ROOT . '/wxpay/lib/WxPay.JsApiPay.php';
require_once XLB_WEB_ROOT . '/wxpay/lib/WxPay.NativePay.php';
require_once XLB_WEB_ROOT . '/wxpay/lib/notify.php';
require_once XLB_WEB_ROOT . '/wxpay/lib/log.php';
class WxController extends PublicController
{
    const TRADE_TYPE_NATIVE = 'NATIVE';
    const TRADE_TYPE_JSAPI  = 'JSAPI';
    const TRADE_TYPE_APP    = 'APP';

    /**
     * 生成签名
     * @param $data
     * @return string
     */
    public function signAction() {
        $total_fee = 0.01;
        $trade_type = $this->getParam('trade_type', self::TRADE_TYPE_APP);
        $data = @$_GET;
        $input = new \WxPayUnifiedOrder();
        $data['time'] = date('Y-m-d H:i:s');
        $input->SetBody("小萝卜支付");
        $input->SetTotal_fee($total_fee * 10 * 10);
        /*
        $input->SetAttach(
            json_encode(array())
            );
        */
        $out_on = CabiController::build_order_no();
        $input->SetOut_trade_no($out_on);
        $input->SetTime_start(date("YmdHis"));
        $input->SetTime_expire(date("YmdHis", time() + 600));
        $input->SetNotify_url("https://www.ixiaoluobo.com/xlb/wxpay/notify");
        $input->SetTrade_type($trade_type);
        $input->SetProduct_id($out_on);
        if ($trade_type == self::TRADE_TYPE_JSAPI) {
            $code = $this->getParam('code', null);
            if (is_null($code)) {
                $this->xlb_ret(0, 'code not find');
            }
            $jsapipay = new  \JsApiPay();
            $openid = $jsapipay->GetOpenidFromMp($code);
            if (is_null($openid) || empty($openid)) {
                $this->xlb_ret(0, 'get openid from failed');
            }
            $input->SetOpenid($openid);
        }
        $result = \WxPayApi::unifiedOrder($input);
        $this->xlb_ret(1, "", $result);
    }

    /**
     * 退款
     * @param $order_no
     * @param $order_amount_total
     * @return bool|SimpleXMLElement[]
     */
    static public function refund($order_no, $order_amount_total) {

    }

    /**
     * 异步通知地址
     */
    public function notifyAction() {

    }

    public function returnAction() {
        $this->write_log(var_export(@$_GET,true));
    }
}