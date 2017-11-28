<?php
require_once('CommonController.php');
class IndexController extends CommonController
{	
	function init() 
	{

		//执行父类中的构造函数
		parent::init();
		
        /*param分为json格式，三个参数分为：head、body、token*/
		
		//对象形式
		//$param = $this->_request->getPost('param');
		//$obj = json_decode($param);
		//print_r($obj->body->userMobile);exit;
		
		if($this->action == 'upload' || $this->action == 'upload-more'){
		    $arr = Tools::getParam($this->_request->getPost('param'));
		}else{
                    $arr = Tools::object2array(json_decode(file_get_contents("php://input")));	
		}		
				
		//数组形式
		//$arr = Tools::getParam($this->_request->getPost('param'));
		//$con = file_get_contents("php://input");
		//$arr = Tools::object2array(json_decode($con));		
		
		if(!empty($arr['body'])){
		  $this->body = $arr['body'];
		}
		
		if(!empty($arr['token'])){
		    $this->userId = Tools::getDecodeUidForToken($arr['token']);
		}
		
		//$this->userInfo = new UserInfo();
		$this->area = new NewArea();
		$this->cache = new Cache();
	
	}	
	
	public function indexAction()
	{
        echo 'sns';
	}	
	
	public function messageAction()
	{
	    echo Tools::getResult('0', '请登录后使用');
   	    //echo json_encode(array('status'=>'0','info'=>'请登录后使用'));
	}	
	
	/**
	 * 获得验证码
	 *
	 */
	public function imgcodeAction(){
	    //调用我们的验证码类
	    Zend_Loader::loadClass('Common_Plugin_MyCaptcha');
	    $imagecode = new Common_Plugin_MyCaptcha();
	    //返回验证码图片
	    $imagecode->image();
	}
	
	/**
	 *     更新地区缓存
	 */
	public function cacheAction()
	{
	    /*更新地区缓存*/
	    $arr = $this->area->listData(0, 0, null);
	    $tempArr = array();
	    foreach($arr as $k => $v)
	    {
	        $tempArr[$v['areaId']] = array(
	            'id' => $v['areaId'],
	            'parentid' => $v['areaPid'],
	            'name' => $v['areaName'],
	            'ename' => $v['areaEname'],
	            
	        );	        
	    }
	    $mytree=new Common_Plugin_Tree();
	    $mytree->tree($tempArr);
	    $treeArr = $mytree->get_tree_old2(0);
	    $this->cache->editData('1', array('text'=>json_encode($treeArr)));
	    
	    $test = $this->cache->showDetail('1');
	    print_r($test['text']);
	}
	
	/**
	 *     地区树型分类
	 */	
	public function areaAction()
	{
	    $detail = $this->cache->showDetail('1');
	    echo Tools::getResult('1', '',json_decode($detail['text']));
	}
	
	/**
	 *     文件上传 
	 */
	public function uploadAction()
	{
	    $type = array('activity','avatar','service','shop','share');
	    if(!in_array($this->body['type'], $type)){
	        echo Tools::getResult('0', '未知图片分类');
	        exit;
	    }
	    $path = '/public/upload/'.$this->body['type'];
	    $domain = Zend_Registry::get('domain');
	    $fileType = array('jpg','jpeg','png','gif','bmp');  
	    
	    $upload = new Common_Plugin_Upload($domain,$path,$fileType);
	    $res = $upload->upload();
	    
	    if($res['status'] == '1'){
	        echo Tools::getResult('1', $res['info'],$res['data']);
	    }else{
	        echo Tools::getResult('0', $res['info']);
	    }
	    
	}
	
	/**
	 *     多文件上传
	 */
	public function uploadMoreAction()
	{
	    $type = array('activity','avatar','service','shop','share');
	    if(!in_array($this->body['type'], $type)){
	        echo Tools::getResult('0', '未知图片分类');
	        exit;
	    }
	    $path = '/public/upload/'.$this->body['type'];
	    $domain = Zend_Registry::get('domain');
	    $fileType = array('jpg','jpeg','png','gif','bmp');
	     
	    $upload = new Common_Plugin_Upload2($domain,$path,$fileType);
	    $res = $upload->upload();
	     
	    if($res['status'] == '1'){
	        echo Tools::getResult('1', $res['info'],$res['data']);
	    }else{
	        echo Tools::getResult('0', $res['info']);
	    }
	     
	}	
			
}

?>