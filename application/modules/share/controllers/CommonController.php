<?php
class CommonController extends Zend_Controller_Action
{
	var $cache;
	function init() {
		$this->registry = Zend_Registry::getInstance();
		$this->view = $this->registry['view'];
		$this->view->baseUrl = $this->_request->getBaseUrl();
		$this->dbAdapter = $this->registry['dbAdapter'];
		$this->translate = $this->registry['translate'];
		
		
		// 站点基本信息
		$this->view->version = $this->registry['version'];
		$this->view->domain = $this->registry['domain'];
		$this->view->sitename = $this->registry['sitename'];
		$this->view->keywords = $this->registry['keywords'];
		$this->view->description = $this->registry['description'];
		
		
		//改变模板文件位置
		$this->view->setScriptPath('./app/views/scripts/default/');
		//模板文件访问路径
		$tpl = $this->view->getScriptPaths();
		$this->view->tplpath = $this->view->domain.'/'.str_replace('\\','/',$tpl[0]);
		
		// 缓存配置
		/*$frontendOptions = array(
        	'lifeTime' => 120, // 两分钟的缓存生命期
        	'automatic_serialization' => true
        );

        $backendOptions = array(
        	'cache_dir' => "data/cache/" // 放缓存文件的目录
        );*/
		
		$this->module = $this->getRequest()->getModuleName();
		$this->controller = $this->getRequest()->getControllerName();
		$this->action = $this->getRequest()->getActionName();		

    	/*// 取得一个Zend_Cache_Core 对象
    	//$this->cache = Zend_Cache::factory('Core','File',$frontendOptions,$backendOptions);
    	//session获得当前用户信息
		$user = Zend_Auth::getInstance()->getIdentity();
		//cookie获得当前用户信息
		if($user)
		{
			$this->view->id = $this->id = $user->admin_id;
			$this->view->username = $this->username = $user->admin_name;
			$this->view->admin_auth = $this->admin_auth = $user->role;
			$this->view->personal_name = $this->personal_name = $user->admin_personal_name;
		}*/
		
	}
	
	/**
	 * 设置cookie
	 *
	 * @param array $data
	 * @param int $expire
	 */
	function setCookie($data=array(),$expire=0)
	{
		//$time = $expire? time()+$expire : 0;
		$time = 0;
		$val = '';
		foreach ($data as $key=>$value){
			$val .= $key.'='.$value."|";
		}
		setcookie('cn',$this->authcode($val,'ENCODE'),$time,'/');
	}
	
	/**
	 * 通过Cookie获得用户信息
	 *
	 */
	function getCookie($name)
	{
		if(isset($_COOKIE['cn'])){
			$val = $this->authcode($_COOKIE['cn'],'DECODE');
		}
		else
		{
			return null;
		}
		$cookiearr = explode('|',$val);
		//修改了foreach部分代码，换成for循环以保证分割数组不出现警告
		$times = count($cookiearr) -1 ;
		for($i=0;$i<$times;$i++)
		{
			list($key,$value) = explode('=',$cookiearr[$i]);
			if ($key==$name) 
			{
				return $value;
			}			
		}
		/*foreach ($cookiearr as $k => $v)
		{
			echo '<br>'.$k .'='.$v;
			list($key,$value) = explode('=',$v);
			if ($key==$name) {
				return $value;
			}
		}*/
		return null;
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
	
	public function SendMail($mailto,$subject,$content){
		// 从寄存器中取得邮件配置信息
		$mailsmtp = Zend_Registry::get('smtp');
		$mailuser = Zend_Registry::get('username');
		$mailpwd = Zend_Registry::get('password');
		// 组装发送者地址
		$sender = $mailuser.'@'.str_replace('smtp.','',$mailsmtp);
		// 写入邮件smtp配置
		$config = array('auth' => 'login', 'username' => $mailuser, 'password' => $mailpwd);
		// 初始化smtp协议
		$transport = new Zend_Mail_Transport_Smtp($mailsmtp, $config);
		// 初始化mail对象
		$mail = new Zend_Mail('utf-8');
		$mail->setBodyText($content);
		$mail->setFrom($sender, 'webmaster');
		$mail->addTo($mailto, $mailto);
		$mail->setSubject($subject);
		$mail->send($transport);
		return true;
	}
	
	function getMicroTime()
	{
	    $time = microtime();
	    list($msec, $sec) = explode(" ", $time);
	    return (float)$sec+(float)$msec;
	}
	
	function getRunTime($start, $end)
	{
	    return $end - $start;
	}
	
        public function sendJson($data)
        {
            $this->_helper->viewRenderer->setNoRender();
            $this->getResponse()->setHeader('content-type', 'application/json');
            echo Zend_Json::encode($data);
        }
        public function addError($key, $val)
        {
            if (array_key_exists($key, $this->_errors)) {
                if (!is_array($this->_errors[$key]))
                    $this->_errors[$key] = array($this->_errors[$key]);

                $this->_errors[$key][] = $val;
            }
            else
                $this->_errors[$key] = $val;
        }

        public function getError($key)
        {
            if ($this->hasError($key))
                return $this->_errors[$key];

            return null;
        }

        public function getErrors()
        {
            return $this->_errors;
        }
		
        public function unsetError($key)
        {
                unset($this->_errors[$key]);
        }		

        public function hasError($key = null)
        {
            if (strlen($key) == 0)
                return count($this->_errors) > 0;

            return array_key_exists($key, $this->_errors);
        }

	
}
