<?php
class XlbController extends Zend_Controller_Action
{
    /**
     * @var string
     */
    protected $module = '';

    /**
     * @var string
     */
    protected $controller = '';

    /**
     * @var string
     */
    protected $action = '';

    /**
     * @var XlbLogModel
     */
    protected $log = null;

    /**
     * @var int
     */
    protected $uid = 0;

    /**
     * @var array
     */
    protected $user = array();


    /**
     * @var string
     */
    protected $token = '';

    /**
     * 初始化函数
     */
    public function init(){
        //初始化模块、控制器、操作
        $this->module       = $this->getRequest()->getModuleName();
        $this->controller   = $this->getRequest()->getControllerName();
        $this->action       = $this->getRequest()->getActionName();

        //权限验证
        $this->_checkAuth();

        /*操作日志*/
        $this->log = XlbLogModel::getInstance();
        $this->_log();
    }

    /**
     * 插入访问日志
     */
    private function _log() {
        if (XLB_DEBUG) {
            return;
        }
        $this->log->insert(array(
            'u_id'              => $this->uid,
            'log_ip'            => $this->get_client_ip(),
            'log_time'          => date('Y-m-d H:i:s'),
            'log_controller'    => $this->controller,
            'log_action'        => $this->action,
            'log_module'        => $this->module,
            'log_calltime'      => $this->_getParam('callTime', '0000-00-00 00:00:00'),
            'log_callsource'    => $this->_getParam('callSource', '')
        ));
    }

    /**
     * 返回数据
     * @param string $code
     * @param string $message
     * @param array $body
     * @param string $callback
     */
    public function xlb_ret($code = '1',$message = '',$data = array(), $callback = ''){
        $res['code'] = (int)$code;
        if($code == '1'){
            $message = !empty($message) ? $message : '请求成功!';
        }else if($code == '0'){
            $message = !empty($message) ? $message : '请求失败!';
        }
        $res['message'] = $message;

        if(!empty($data)){
            $res['data'] = $data;
        } else {
            $res['data'] = null;
        }
        ob_end_clean();
        header('Content-Type:application/json; charset=utf-8');
        if (!empty($callback)) {
            echo $callback . '(' . json_encode($res) . ')';
            exit;
        } else {
            echo json_encode($res);
            exit;
        }
    }

    /**
     * 获取参数
     * @param string $key
     * @param null $default
     * @return mixed
     */
    protected function _getParam($key, $default = null) {
        return $this->getRequest()->getParam($key, $default);
    }

    /**
     * 获取客户端IP地址
     * @param integer $type 返回类型 0 返回IP地址 1 返回IPV4地址数字
     * @return mixed
     */
    public function get_client_ip($type = 0) {
        $type       =  $type ? 1 : 0;
        static $ip  =   NULL;
        if ($ip !== NULL) return $ip[$type];
        if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $arr    =   explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            $pos    =   array_search('unknown',$arr);
            if(false !== $pos) unset($arr[$pos]);
            $ip     =   trim($arr[0]);
        }elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
            $ip     =   $_SERVER['HTTP_CLIENT_IP'];
        }elseif (isset($_SERVER['REMOTE_ADDR'])) {
            $ip     =   $_SERVER['REMOTE_ADDR'];
        }
        // IP地址合法验证
        $long = sprintf("%u",ip2long($ip));
        $ip   = $long ? array($ip, $long) : array('0.0.0.0', 0);
        return $ip[$type];
    }

    /**
     * 检查权限
     * @return bool
     */
    private function _checkAuth() {
        $act = array(
            XLB_APP     => array('login','sendsms'),
            XLB_ADMIN   => array('login')
        );
        if (in_array($this->action, $act[$this->module])) {
            return true;
        }
        if (XLB_ADMIN == $this->module) {
            $token = $_COOKIE['xlbtoken'];
        } else {
            $token = $this->getRequest()->getParam('token',null);
        }
        //验证token
        if(empty($token)) {
            $this->xlb_ret(0, "验证失败,请重新登陆");
        }
        $this->token  = $token;
        $token = Tools::getDecodeUidForToken($this->token);
        list($module, $this->uid) = explode(';',$token);
        if ($module != $this->module) {
            $this->xlb_ret(0, '非法操作');
        } elseif (XLB_APP == $this->module) {
            $row = XlbUserInfoModel::getInstance()->getRowByID($this->uid);
        } elseif (XLB_ADMIN == $this->module) {
            $row = XlbSpModel::getInstance()->getRowByID($this->uid);
        }
        if (is_null($row)) {
            $this->xlb_ret(0, '用户不存在');
        }
        $this->user = $row->toArray();
        return true;
    }

    /**
     * 字符串加解密函数
     *
     * @param string $string
     * @param string $operation
     * @param string $key
     * @param int $expiry
     * @return string
     */
    function authcode($string, $operation = 'DECODE', $key = 'sp', $expiry = 0) {

        $ckey_length = 4;

        $key = md5($key ? $key : 'sp');
        $keya = md5(substr($key, 0, 16));
        $keyb = md5(substr($key, 16, 16));
        $keyc = $ckey_length ? ($operation == 'DECODE' ? substr($string, 0, $ckey_length): substr(md5(microtime()), -$ckey_length)) : '';

        $cryptkey = $keya.md5($keya.$keyc);
        $key_length = strlen($cryptkey);

        $string = $operation == 'DECODE' ? base64_decode(substr($string, $ckey_length)) : sprintf('%010d', $expiry ? $expiry + time() : 0).substr(md5($string.$keyb), 0, 16).$string;
        $string_length = strlen($string);

        $result = '';
        $box = range(0, 255);

        $rndkey = array();
        for($i = 0; $i <= 255; $i++) {
            $rndkey[$i] = ord($cryptkey[$i % $key_length]);
        }

        for($j = $i = 0; $i < 256; $i++) {
            $j = ($j + $box[$i] + $rndkey[$i]) % 256;
            $tmp = $box[$i];
            $box[$i] = $box[$j];
            $box[$j] = $tmp;
        }

        for($a = $j = $i = 0; $i < $string_length; $i++) {
            $a = ($a + 1) % 256;
            $j = ($j + $box[$a]) % 256;
            $tmp = $box[$a];
            $box[$a] = $box[$j];
            $box[$j] = $tmp;
            $result .= chr(ord($string[$i]) ^ ($box[($box[$a] + $box[$j]) % 256]));
        }

        if($operation == 'DECODE') {
            if((substr($result, 0, 10) == 0 || substr($result, 0, 10) - time() > 0) && substr($result, 10, 16) == substr(md5(substr($result, 26).$keyb), 0, 16)) {
                return substr($result, 26);
            } else {
                return '';
            }
        } else {
            return $keyc.str_replace('=', '', base64_encode($result));
        }
    }
}