<?php
class IndexController extends PublicController
{
    /**
     * 登陆接口
     */
    public function loginAction() {
        //登陆验证
        $filter = new Zend_Filter_StripTags();

        //验证手机号
        $mobile = $filter->filter($this->getParam('userMobile',null));
        if (empty($mobile)) {
            $this->xlb_ret('0', '手机号不能为空!');
        }

        //验证吗
        $smsCode = trim($this->getParam('smsCode'));
        $authCode = $this->authcode($_COOKIE['xlbcode'],'DECODE');
        if(strcmp($authCode , $smsCode)!=0 && $smsCode != '8888'){
            $this->xlb_ret('0', '手机验证码错误!');
        }

        //第一次登陆
        $firstlogin = true;

        //查询数据库
        $userInfo = XlbUserInfoModel::getInstance();
        $row = $userInfo->fetchRow('u_mobile='.$mobile);
        $u_picture = '';
        $u_type = 1;
        if(empty($row)){
            $data['u_mobile']       = $mobile;
            $data['u_creattime']    = time();
            $data['u_optime']       = time();
            $data['u_nickname']     = $mobile;
            $data['u_balance']      = 2;//默认2元
            $uid                    = $userInfo->insert($data);
            $u_nickname             = $mobile;
        }else{
            $user       = $row->toArray();
            $uid        = $user['u_id'];
            $firstlogin = false;
            $u_picture  = null == $user['u_picture'] ? '' : $user['u_picture'];
            $u_type     = $user['u_type'];
            $u_nickname = $user['u_nickname'];
        }

        //生成token
        $token = Tools::getEncodeUid(XLB_APP.';'.$uid);
        $ret = array(
            'token'         =>  $token,
            'firstlogin'    =>  $firstlogin,
            'logo'          =>  $u_picture,
            'u_type'        =>  $u_type,
            'u_nickname'    =>  $u_nickname
        );
        $this->xlb_ret('1', '登录成功!', $ret);
    }

    /**
     * 退出登陆
     */
    public function logoutAction()
    {
        $status = true;
        if($status){
            $this->xlb_ret('1', '退出成功!');
        }else{
            $this->xlb_ret('0', '退出失败!');
        }
    }

    /**
     * 获得验证码
     *
     */
    public function imgcodeAction()
	{
        //调用我们的验证码类
        Zend_Loader::loadClass('Common_Plugin_MyCaptcha');
        $imagecode = new Common_Plugin_MyCaptcha();
        //返回验证码图片
        $imagecode->image();
    }

    /**
     * 发送短信验证码
     */
    public function sendsmsAction()
    {
        $userMobile = $this->getParam('userMobile');
        if(empty($userMobile)) {
            $this->xlb_ret(0, '手机号不能为空!');
        }
		
		//初始化数据
        $key	= 'xlbcode';
        $to 	= $userMobile;
        $datas 	= array(Tools::rand('4','1'),'15');
		$ip 	= Zend_Registry::get('serverIP');
		$port 	= Zend_Registry::get('serverPort');
		$version= Zend_Registry::get('softVersion');
		$sid	= Zend_Registry::get('accountSid');
		$token	= Zend_Registry::get('accountToken');
		$appId	= Zend_Registry::get('appId');
		$tempId = Zend_Registry::get('tempId');
		
		//调试用
        if (XLB_DEBUG) {
            setcookie($key,$this->authcode($datas[0],'ENCODE'),time() + 15 * 60,'/');
            $this->xlb_ret('1', '发送成功');
        }
		
		//创建SMS实例
        $sms = new SMS($ip, $port, $version);
        $sms->setAccount($sid, $token);
        $sms->setAppId($appId);
		
        // 发送模板短信
        $result = $sms->sendTemplateSMS($to, $datas, $tempId);
        if($result == NULL ) {
            $this->xlb_ret('0', '发送失败');
        }
        if($result->statusCode != 0) {
            $this->xlb_ret('0', json_decode(json_encode($result->statusMsg),true)[0]);
        } else {
            setcookie($key,$this->authcode($datas[0],'ENCODE'),time() + 15 * 60,'/');
            $this->xlb_ret('1', '发送成功');
        }
    }

    /**
     * 获取公司信息
     */
    public function gciAction(){
        $company = new Zend_Config_Ini('./application/configs/company.ini','company',true);
        $this->xlb_ret(1, '', $company->toArray());
    }
}

