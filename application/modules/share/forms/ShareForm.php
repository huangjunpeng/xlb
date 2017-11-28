<?php
require_once 'Zend/Session/Namespace.php';
class ShareForm extends Common_Plugin_FormProcessor
{
	protected $db = null;
	protected $_validateOnly = false;
	protected $share = null;
	protected $userId = null;
	
	public function __construct($userId = 0)
	{
		parent::__construct();
		$this->share = new Share();
		$this->userId = $userId;
		
		$mdb = Zend_Registry::get('mdb');
		$this->mshare = $mdb->share;
                $this->muser = $mdb->user;
	}
	
	public function process(Zend_Controller_Request_Abstract $request)
	{	
	    $con = file_get_contents("php://input");
	    $arr = Tools::object2array(json_decode($con));
	    $body = $arr['body'];
	   
            
	    $this->shaText = trim($body['shaText']);
	    
	    if (mb_strlen($this->shaText,'utf-8')>140 )
	        $this->addError('shaText', '分享内容不能超过140字!');
	    else
	        $data['shaText']= $this->shaText;
	   
	   $this->shaAdress = trim($body['shaAdress']);	   
	   if (mb_strlen($this->shaAdress,'utf-8')>255 )
	       $this->addError('shaAdress', '分享地址不能超过255字!');
	   else
	       $data['shaAdress']= $this->shaAdress;
           
	   $this->shaPic = trim($body['shaPic']);	   
	   if (mb_strlen($this->shaPic,'utf-8')>2048 )
	       $this->addError('shaPic', '分享图片长度不能超过2048!');
	   else
	       $data['shaPic']= $this->shaPic;            
           
	   $data['longitude'] = trim($body['longitude']);
	   $data['latitude'] = trim($body['latitude']);
	   $data['shaTime'] = date('Y-m-d H:i:s');	
	   $data['userId'] = $this->userId;
           
            if(!empty($data['latitude']) && !empty($data['longitude'])){
                $geohash = new Geohash();
                $data['shaGeohash'] = $geohash->encode($data['latitude'],$data['longitude']);
            }
	
            if (!$this->hasError())
            {
                    $id = $this->share->addData($data);
                    $data['shaId'] = $id;
                    $this->mshare->insert($this->formatData($data));
                    return $id;
            }	
            return !$this->hasError();					
	}
	
	private function formatData($data)
	{
	    $result = array();
	    $result['shaId'] = (int)$data['shaId'];
	    $result['shaTime'] = $data['shaTime'];
	    $result['shaText'] = $data['shaText'];
            $result['userId'] = (int)$data['userId'];            
	    $user = $this->muser->findOne(array("userId"=>(int)$data["userId"]));
	    $result['userSex'] = $user['userSex'];
            $result['coordinate'] = array(
	        (double)$data['longitude'],
	        (double)$data['latitude']
	    ); 
	   return $result;
	}
}

?>