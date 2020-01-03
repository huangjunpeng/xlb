<?php
class XlbController extends PublicController
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
        return;
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
     * 获取参数
     * @param string $key
     * @param null $default
     * @return mixed
     */
    protected function _getParam($key, $default = null) {
        return $this->getRequest()->getParam($key, $default);
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
            $token = @$_COOKIE['xlbtoken'];
        } else {
            $token = $this->getRequest()->getParam('token',null);
        }
        //验证token
        if(empty($token) && XLB_ADMIN == $this->module) {
            $this->exitlogin();
        } elseif (empty($token) && XLB_APP == $this->module){
            $this->xlb_ret(0, '验证失败,请重新登录');
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
        $this->user = $row->toArray()[0];
        return true;
    }
}