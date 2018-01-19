<?php
// 全局处理，主要包括报错级别，时区
error_reporting(E_ALL|E_STRICT);                  //调试时可以设置为E_ALL
date_default_timezone_set('Asia/Shanghai');
header("content-Type: text/html; charset=utf-8");
set_include_path('.'
    .PATH_SEPARATOR.'./library'
    .PATH_SEPARATOR.'./application/controllers'
    .PATH_SEPARATOR.'./application/models'
    .PATH_SEPARATOR.'./application/modules/app/controllers'
    .PATH_SEPARATOR.'./application/modules/app/models'
    .PATH_SEPARATOR.'./application/modules/admin/controllers'
    .PATH_SEPARATOR.'./application/modules/admin/models'
    .PATH_SEPARATOR.'./library/Common/Plugin'
    .PATH_SEPARATOR.get_include_path()
);

//是否开启调试
define('XLB_DEBUG', false);
//定义前台模块
define('XLB_APP','app');
//定义后台模块
define('XLB_ADMIN','admin');
//web根目录
define('XLB_WEB_ROOT',dirname(__FILE__));
//系统附件路径
define('XLB_UPLOAD', '/public/upload');
//data目录
define('XLB_WEB_DATA',dirname(__FILE__).'/data');

//设置Zend Framework 自动载入类文件,for 1.12
require_once "Zend/Loader/Autoloader.php";
Zend_Loader_Autoloader::getInstance()->setFallbackAutoloader(true);

//解决swfupload产生的新会话问题
if(!empty($_POST['PHPSESSID']))
    Zend_Session::setId($_POST['PHPSESSID']);
try {
    //开启session
    Zend_Session::start();

    //初始化寄存器
    $registry = Zend_Registry::getInstance();

    // 加载配置。主要是数据库相关的配置，可以分多个组，便于更改，建议使用，也可以直接在这里配置
    $config = new Zend_Config_Ini('./application/configs/config.ini',null,true);
    Zend_Registry::set('config', $config);

    //初始化数据库对象，并注册到整个应用空间
    $dbAdapter = Zend_Db::factory($config->general->db->adapter, $config->general->db->toArray());
    $dbAdapter->query("SET NAMES {$config->general->db->charset}");
    Zend_Db_Table::setDefaultAdapter($dbAdapter);
    Zend_Registry::set('dbAdapter',     $dbAdapter);
    Zend_Registry::set('dbprefix',      $config->general->db->prefix);

    //配置全文索引
    Zend_Registry::set('sphhost',       $config->sphinx->host);
    Zend_Registry::set('sphport',       $config->sphinx->port);

    //配置短信
    Zend_Registry::set('accountSid',    $config->sms->accountSid);
    Zend_Registry::set('accountToken',  $config->sms->accountToken);
    Zend_Registry::set('appId',         $config->sms->appId);
    Zend_Registry::set('serverIP',      $config->sms->serverIP);
    Zend_Registry::set('serverPort',    $config->sms->serverPort);
    Zend_Registry::set('softVersion',   $config->sms->softVersion);
    Zend_Registry::set('tempId',        $config->sms->tempId);


    //设置控制器
    $frontController = Zend_Controller_Front::getInstance();
    $frontController->throwExceptions(true);
    $frontController->addModuleDirectory('./application/modules');
    $frontController->setDefaultModule('app');
    $frontController->dispatch();
} catch (Zend_Exception $e) {
    $res['code']        = 0;
    $res['message']     = '请求失败';
    $res['error']       = $e->getMessage();
    ob_end_clean();
    header('Content-Type:application/json; charset=utf-8');
    echo json_encode($res);
    exit;
}
?>



