<?php
require_once('CommonController.php');
class ServiceController extends CommonController
{	
	function init() 
	{
		//执行父类中的构造函数
		parent::init();
		
        /*param分为json格式，三个参数分为：head、body、token*/
		//数组形式
		$con = file_get_contents("php://input");
		$arr = Tools::object2array(json_decode($con));	
		if(!empty($arr['body'])){
		  $this->body = $arr['body'];
		}
		  
		if(!empty($arr['token'])){
		    $this->userId = Tools::getDecodeUidForToken($arr['token']);
		}
		$this->cabinet      = new Cabinet();
                $this->cabiSpace    = new CabinetSpace();
                $this->book         = new Book();
                $this->order        = new UserOrder();
                
                $mdb = Zend_Registry::get('mdb');
                $this->mcabinet = $mdb->cabinet;
                $this->mbook = $mdb->book;              
	}
	
        
        /**
	 *  增加书柜
	 */
        public function cabiinfoSetAction()
	{
            $body = $this->body;
            $this->cabiId = !empty($body['cabiId']) > 0 ? (int)$body['cabiId'] : 0;
	    /*if($this->cabiId > 0){
	        $detail = $this->cabinet->showDetail($this->cabiId);
	        if($detail['userId'] != $this->userId){
	            $this->addError('userId', '无权修改该数据!');
	        }
	    }*/
	    $this->cabiName = trim($body['cabiName']);	    
	    if (strlen($this->cabiName) == 0)
	        $this->addError('cabiName', '名称不能为空!');
	    else if (mb_strlen($this->cabiName,'utf-8')>100 )
	        $this->addError('cabiName', '名称不能超过100字!');
	    else
	        $data['cabiName']= $this->cabiName;
	    
	   
           $this->cabiNo = trim($body['cabiNo']);	         
	   if (strlen($this->cabiNo) == 0)
	        $this->addError('cabiNo', '编号不能为空!');
	   else if (mb_strlen($this->cabiNo,'utf-8')>100 )
	        $this->addError('cabiNo', '编号错误!');
	   else
	        $data['cabiNo']= $this->cabiNo;
            
            //判断书柜是否已经存在
            $cabi_row = $this->cabinet->listData( 0,0,array('cabiNo'=>$this->cabiNo) );
            if( count($cabi_row) > 0 ){
                echo Tools::getResult('0', '该书柜编号已经存在！');
                exit;                      
            }
            
	    $this->spaceNum = trim($body['spaceNum']);	    
	    if (strlen($this->spaceNum) == 0)
	        $this->addError('spaceNum', '空格数为空!');
	    else if ((int)$this->spaceNum>100 )
	        $this->addError('spaceNum', '空格数可能太多!');
	    else{
	        $data['spaceNum']= $this->spaceNum;
                $data['totalNum']    = $data['spaceNum'];
            }
            
           $this->cabiDesc = trim($body['cabiDesc']);	         
	   if (strlen($this->cabiDesc) > 0)
                $data['cabiDesc']    = trim($body['cabiDesc']);

           $data['cabiLong']    = trim($body['cabiLong']);
	   $data['cabiLat']     = trim($body['cabiLat']);
           $data['bookNum']     = 0;
	   $data['optTime']     = date('Y-m-d H:i:s');
	   
	   if(!empty($data['cabiLong']) && !empty($data['cabiLat'])){
                $geohash = new Geohash();
                $data['cabiGeohash'] = $geohash->encode($data['cabiLong'],$data['cabiLat']);
	   }
	
            if (!$this->hasError()){
                if($this->cabiId > 0){
                    $this->cabinet->editData($this->cabiId, $data);
                    $data['cabiId'] = $this->cabiId;
                    $this->mcabinet->update(array('cabiId'=>(int)$this->cabiId),$this->cabiMongoDb($data));        
                }else{
                    $data['creatTime'] = date('Y-m-d H:i:s');
                    $id = $this->cabinet->addData($data);
                    $data['cabiId'] = $id;
                    
                    //柜子格子操作
                    for($i=1; $i<=(int)$this->spaceNum; $i++){
                        $id = $this->cabiSpace->addData(array('cabiId'=>$data['cabiId'],
                                                                'cabiSpaceNo'=>$i,
                                                                'optTime'=>date('Y-m-d H:i:s'),
                                                                'creatTime'=>date('Y-m-d H:i:s')));
                    }
                    $this->mcabinet->insert($this->cabiMongoDb($data));
                }
            }
            
            if(!$this->hasError()){
                echo Tools::getResult('1', '操作成功!', array("cabiId"=>$data['cabiId']));
            }else{
                echo Tools::getResult('0', $this->getErrors());
            }
	}
        
	private function cabiMongoDb($data)
	{
	    $result = array();
	    $result['cabiId']   = (int)$data['cabiId'];
	    $result['cabiNo']   = (int)$data['cabiNo'];
	    $result['cabiName']     = $data['cabiName'];
            $result['cabiDesc']     = $data['cabiDesc'];
            $result['bookNum']      = (int)$data['bookNum'];
            $result['totalNum']     = (int)$data['totalNum'];
            $result['spaceNum']     = (int)$data['spaceNum'];
	    $result['coordinate'] = array(
	        (double)$data['cabiLong'],
	        (double)$data['cabiLat']
	    ); 
	   return $result;
	}	
	
        /**
	 *  获取书柜详情
	 */
        public function cabiinfoGetAction()
	{   
            $indexFlag = 0;
            if( !empty($this->body['isIndex']) ){
                if( 1 == (int)$this->body['isIndex'] ){
                    //$this->body['cabiId'] = '14';
                    $indexFlag = 1;
                }
            }

            if(!$indexFlag && empty($this->body['cabiId'])){
                echo Tools::getResult('0', '书柜ID不能为空');
                exit;
            }
            
            $lbsFlag = 0;
            if( !empty($this->body['longitude']) &&
               !empty($this->body['latitude']) ){
                    $lbsFlag = 1;
            }
            
            $this->cabiId = 0;
            $rows = array();
            if( $lbsFlag && $indexFlag ){
                $options['coordinate'] = array(
                    '$nearSphere'=>array(
                        (double)$this->body['longitude'],
                        (double)$this->body['latitude']
                    )
                );
                $options['bookNum'] = array('$gt'=>0);
                //search mongodb
                 $cursor = $this->mcabinet->find($options)->skip(0)->limit(1);
                 foreach ($cursor as $k => $v) {
                    $this->cabiId = $v['cabiId'];
                    $this->distance = Tools::getDistance(
                                            $this->body['latitude'],
                                            $this->body['longitude'],
                                            $v['coordinate'][1],
                                            $v['coordinate'][0]);
                 }               
            }else{
                $this->cabiId = $this->body['cabiId'];               
            }
            
            	    	   
            $data1 = $this->cabinet->listData( 0,0,array('cabiId'=>$this->cabiId) );
            foreach($data1 as $k => $v){
                $rows['cabiId']         = $v['cabiId'];
                $rows['cabiName']       = $v['cabiName'];
                $rows['cabiNo']         = $v['cabiNo'];
                $rows['cabiStatus']     = $v['cabiStatus'];                 
                $rows['cabiLong']       = $v['cabiLong'];
                $rows['cabiLat']        = $v['cabiLat'];
                $rows['spaceNum']       = $v['spaceNum'];
                $rows['cabiDesc']       = $v['cabiDesc'];
                $rows['bookNum']        = $v['bookNum'];
                $rows['totalNum']       = $v['totalNum'];
                if($lbsFlag){
                    $rows['distance'] = $this->distance;
                }

                $data2 = $this->cabiSpace->listData( 0,0,array('cabiId'=>$this->cabiId) );
                foreach($data2 as $k => $v){
                    $spaceRows[$k]['cabiSpaceId']           = $v['cabiSpaceId'];
                    $spaceRows[$k]['cabiSpaceNo']           = $v['cabiSpaceNo'];
                    $spaceRows[$k]['status']                = $v['status'];
                }
                $rows['spaceRows'] = $spaceRows;

                $data3 = $this->book->listData( 0,0,array('cabiId'=>$this->cabiId) );
                foreach($data3 as $k => $v){
                    $bookRows[$k]['bookLong']       = $v['bookLong'];
                    $bookRows[$k]['bookLat']        = $v['bookLat'];
                    $bookRows[$k]['bookId']         = $v['bookId'];
                    $bookRows[$k]['cabiSpaceNo']    = $v['cabiSpaceNo'];
                    $bookRows[$k]['status']         = $v['status'];
                    $bookRows[$k]['sharePrice']     = $v['sharePrice'];
                    $bookRows[$k]['cabiNo']         = $v['cabiNo'];
                    $bookRows[$k]['bookName']       = $v['bookName'];
                    $bookRows[$k]['bookPic']        = $v['bookPic'];
                }
                $rows['bookRows'] = $bookRows;
            }
	     
	    echo Tools::getResult('1', '',$rows);          
        
        }
        /**
	 *  web管理端用 获取书柜
	 */
        public function webgetcabiAction()
	{   
            if( empty($this->body['cabiNo'])){
                echo Tools::getResult('0', '书柜编号不能为空');
                exit;
            }            
            $this->cabiNo = $this->body['cabiNo'];   	   
            $data1 = $this->cabinet->listData( 0,0,array('cabiNo'=>$this->cabiNo) );
            $rows= array();
            foreach($data1 as $k => $v){
                $rows['cabiId']         = $v['cabiId'];
                $rows['cabiName']       = $v['cabiName'];
                $rows['cabiNo']         = $v['cabiNo'];
                $rows['cabiStatus']     = $v['cabiStatus'];                 
                $rows['cabiLong']       = $v['cabiLong'];
                $rows['cabiLat']        = $v['cabiLat'];
                $rows['spaceNum']       = $v['spaceNum'];
                $rows['cabiDesc']       = $v['cabiDesc'];
                $rows['bookNum']        = $v['bookNum'];
                $rows['totalNum']       = $v['totalNum'];
                if($lbsFlag){
                    $rows['distance'] = $this->distance;
                }

                $spaceRows= array();
                $data2 = $this->cabiSpace->listData( 0,0,array('cabiId'=>$rows['cabiId']) );
                foreach($data2 as $k => $v){
                    $spaceRows[$k]['cabiSpaceId']           = $v['cabiSpaceId'];
                    $spaceRows[$k]['cabiSpaceNo']           = $v['cabiSpaceNo'];
                    $spaceRows[$k]['status']                = $v['status'];
                }
                $rows['spaceRows'] = $spaceRows;

                
                $bookRows= array();
                $data3 = $this->book->listData( 0,0,array('cabiId'=>$rows['cabiId']) );
                foreach($data3 as $k => $v){
                    $bookRows[$k]['bookLong']       = $v['bookLong'];
                    $bookRows[$k]['bookLat']        = $v['bookLat'];
                    $bookRows[$k]['bookId']         = $v['bookId'];
                    $bookRows[$k]['cabiSpaceNo']    = $v['cabiSpaceNo'];
                    $bookRows[$k]['status']         = $v['status'];
                    $bookRows[$k]['sharePrice']     = $v['sharePrice'];
                    $bookRows[$k]['cabiNo']         = $v['cabiNo'];
                    $bookRows[$k]['bookName']       = $v['bookName'];
                    $bookRows[$k]['bookPic']        = $v['bookPic'];
                }
                $rows['bookRows'] = $bookRows;
            }
	     
	    echo Tools::getResult('1', '',$rows);          
        
        }       
        /**
	 *  web管理端用 删除书柜
	 */
        public function cabiinfoDelAction()
	{
	    $id = (int)$this->body['cabiId'];
	    $detail = $this->cabinet->showDetail($id);
	    if(count($detail)<1 ){
	        echo Tools::getResult('0', "该书柜不存在");
	        exit;
	    }
	    if($this->cabinet->delData($id)){
                //删除空格表
                $this->cabiSpace->delData(array('cabiId'=>(int)$id));
                
	        $this->mcabinet->remove(array('cabiId'=>(int)$id));
                
                //删除书
                $data = $this->book->listData( 0,0,array('cabiId'=>$id) );
                foreach($data as $k => $v){                    
                    $this->mbook->remove(array('bookId'=>(int)$v['bookId']));
                }
                $this->book->delData(array('cabiId'=>(int)$id));
                
	        echo Tools::getResult('1', "删除成功");
	    }else{
	        echo Tools::getResult('0', "删除失败");
	    }       
        }
        /**
	 *  web管理用 获取图书列表
	 */
        public function webgetbooklistAction()
	{   
            $data3 = $this->book->listData( 0,0,array() );
            foreach($data3 as $k => $v){
                $bookRows[$k]['bookLong']       = $v['bookLong'];
                $bookRows[$k]['bookLat']        = $v['bookLat'];
                $bookRows[$k]['bookId']         = $v['bookId'];
                $bookRows[$k]['cabiSpaceNo']    = $v['cabiSpaceNo'];
                $bookRows[$k]['status']         = $v['status'];
                $bookRows[$k]['sharePrice']     = $v['sharePrice'];
                $bookRows[$k]['cabiNo']         = $v['cabiNo'];
                $bookRows[$k]['bookName']       = $v['bookName'];
                $bookRows[$k]['bookDesc']       = $v['bookDesc'];
                $bookRows[$k]['bookNo']         = $v['bookNo'];
                $bookRows[$k]['bookPic']        = $v['bookPic'];
            }
            $rows['bookRows'] = $bookRows;	     
	    echo Tools::getResult('1', '',$rows);          
        
        }        
        /**
	 *  获取书柜list
	 */
        public function cabiSearchAction()
	{
            
            if(!empty($this->body['bookName'])){
               echo Tools::getResult('1', '',$this->cabiSearchForBook());  
               return;
            }
            
            $page = (int)$this->body['page'];
	    $length = (int)$this->body['length'];
	
	    $page = $page<1 ? 1 : $page;
	    $length = $length<1 ? 1 : $length;
	    $length = $length>100 ? 100 : $length;
	    
	    $options = array();            
            if(!empty($this->body['cabiName'])){
               $options['cabiName'] = array('$regex'=>$this->body['cabiName'],'$options'=>'$i');
            }
            
            $lbsFlag = 0;
            if(!empty($this->body['longitude'])
            && !empty($this->body['latitude'])){
                $options['coordinate'] = array(
                    '$nearSphere'=>array(
                        (double)$this->body['longitude'],
                        (double)$this->body['latitude']
                    )
                );
                $lbsFlag = 1;
            }
            
            //search mongodb
	    $total = $this->mcabinet->count($options);
	    $pageCount = ceil($total/$length);
	    $cursor = $this->mcabinet->find($options)->skip(($page-1)*$length)->limit($length);
            
	    $rows = array();
            $data = array();
            $keyIds = array();
	    foreach ($cursor as $k => $v) {
                $cabiId = $v['cabiId'];
	        $rows[$cabiId]['cabiId']        = $v['cabiId'];
	        $rows[$cabiId]['cabiName']      = $v['cabiName'];
                $rows[$cabiId]['cabiDesc']      = $v['cabiDesc'];
	        $rows[$cabiId]['cabiNo']        = $v['cabiNo'];
                $rows[$cabiId]['cabiStatus']    = $v['cabiStatus'];             
                $rows[$cabiId]['cabiLong']      = $v['coordinate'][1];
                $rows[$cabiId]['cabiLat']       = $v['coordinate'][0];
                $rows[$cabiId]['spaceNum']      = $v['spaceNum'];
                if($lbsFlag){
                     $rows[$cabiId]['distance'] = Tools::getDistance(
                                             $this->body['latitude'],
                                             $this->body['longitude'],
                                             $v['coordinate'][1],
                                             $v['coordinate'][0] ); 
                 }
                $data[] = $rows[$cabiId];
                $keyIds[] = $cabiId;
	    }
            
	    $result = array();
	    $result['total'] = $total;
	    $result['pageCount'] = $pageCount;
	    $result['currentPage'] = $page;
	    $result['length'] = $length;
	    $result['rows'] = $data;
	
	    echo Tools::getResult('1', '',$result);               
        }
        /**
	 *  搜索某书所在柜子
	 */        
        public function cabiSearchForBook()
        {
            $page = (int)$this->body['page'];
	    $length = (int)$this->body['length'];
	
	    $page = $page<1 ? 1 : $page;
	    $length = $length<1 ? 1 : $length;
	    $length = $length>100 ? 100 : $length;
	    
	    $options = array();            
            $options['bookName'] = array('$regex'=>$this->body['bookName'],'$options'=>'$i');

            
            $lbsFlag = 0;
            if(!empty($this->body['longitude'])
            && !empty($this->body['latitude'])){
                $options['coordinate'] = array(
                    '$nearSphere'=>array(
                        (double)$this->body['longitude'],
                        (double)$this->body['latitude']
                    )
                );
                $lbsFlag = 1;
            }
 	    
            $total = 0;
	    $pageCount = 0;            
            //search mongodb
	    $cursor = $this->mbook->find($options)->skip(($page-1)*$length)->limit($length);
            
	    $rows = array();
            $keyIds = array();
	    foreach ($cursor as $k => $v) {               
                $keyIds[] = $v['bookId'];
	    }
            
            if( count($keyIds)>0 ){
                $bookRows = $this->book->listData( 0,0,array('ids'=>$keyIds) );
                foreach($bookRows as $k => $v){
                    $cabiId = $v['cabiId'];
                    
                    if( array_key_exists($rows, $cabiId) ){
                        $rows[$cabiId]['cabiSpaceRows'][] = $v['cabiSpaceNo'];
                    }else{
                        $rows[$cabiId]['cabiId'] = $v['cabiId'];
                        $rows[$cabiId]['cabiName'] = $v['cabiName'];
                        $rows[$cabiId]['cabiNo'] = $v['cabiNo'];
                        $rows[$cabiId]['cabiStatus'] = $v['cabiStatus'];                 
                        $rows[$cabiId]['cabiLong'] = $v['bookLong'];
                        $rows[$cabiId]['cabiLat'] = $v['bookLat'];
                        if($lbsFlag){
                             $rows[$cabiId]['distance'] = Tools::getDistance(
                                                     $this->body['latitude'],
                                                     $this->body['longitude'],
                                                     $v['bookLong'],
                                                     $v['bookLat'] ); 
                        }
                        $rows[$cabiId]['cabiSpaceRows'][] = $v['cabiSpaceNo'];
                        $total++;
                    }
                }                
            }
           
 	    //$total = 0;
	    $pageCount = ceil($total/$length);
            
	    $result = array();
	    $result['total'] = $total;
	    $result['pageCount'] = $pageCount;
	    $result['currentPage'] = $page;
	    $result['length'] = $length;
	    $result['rows'] = $rows;
	
	    echo Tools::getResult('1', '',$result);              
        }
	/************************************************************/
        /**
	 *  获取书list
	 */
        public function bookSearchAction()
	{
            $page = (int)$this->body['page'];
	    $length = (int)$this->body['length'];
	
	    $page = $page<1 ? 1 : $page;
	    $length = $length<1 ? 1 : $length;
	    $length = $length>100 ? 100 : $length;
	    
	    $options = array();
            
            if(!empty($this->body['bookName'])){
               $options['bookName'] = array('$regex'=>$this->body['bookName'],'$options'=>'$i');
            }
            
            $lbsFlag = 0;
            if(!empty($this->body['longitude'])
            && !empty($this->body['latitude'])){
                $options['coordinate'] = array(
                    '$nearSphere'=>array(
                        (double)$this->body['longitude'],
                        (double)$this->body['latitude']
                    )
                );
                $lbsFlag = 1;
            }
            
            //search mongodb
	    $total = $this->mbook->count($options);
	    $pageCount = ceil($total/$length);
	    $cursor = $this->mbook->find($options)->skip(($page-1)*$length)->limit($length);
            
	    $rows = array();
            $keyIds = array();
	    foreach ($cursor as $k => $v) {
                $bookId = $v['bookId'];
	        $rows[$bookId]['bookId']        = $v['bookId'];
	        $rows[$bookId]['bookName']      = $v['bookName'];
	        $rows[$bookId]['bookNo']        = $v['bookNo'];
                $rows[$bookId]['status']        = $v['status'];                 
                $rows[$bookId]['bookLong']      = $v['coordinate'][0];
                $rows[$bookId]['bookLat']       = $v['coordinate'][1];
                if($lbsFlag){
                     $rows[$bookId]['distance'] = Tools::getDistance(
                                             $this->body['latitude'],
                                             $this->body['longitude'],
                                             $v['coordinate'][1],
                                             $v['coordinate'][0] ); 
                 }                
                $keyIds[] = $bookId;
	    }
            if( count($keyIds)>0 ){
                $bookRows = $this->book->listData( 0,0,array('ids'=>$keyIds) );
                foreach($bookRows as $k => $v){
                    $bookId = $v['bookId'];
                    $rows[$bookId]['bookPic']     = $v['bookPic'];
                    $rows[$bookId]['cabiName']    = $v['cabiName'];
                    $rows[$bookId]['cabiId']      = $v['cabiId']; 
                }                
            }

	    $result = array();
	    $result['total'] = $total;
	    $result['pageCount'] = $pageCount;
	    $result['currentPage'] = $page;
	    $result['length'] = $length;
	    $result['rows'] = $rows;
	
	    echo Tools::getResult('1', '',$result);             
        
        }
       /**
	 *  增加书
	 */
        public function bookinfoSetAction()
	{
            $body = $this->body;
            $this->bookId = !empty($body['bookId']) > 0 ? (int)$body['bookId'] : 0;
	    
	    $this->bookName = trim($body['bookName']);	    
	    if (strlen($this->bookName) > 0)
	        $data['bookName']= $this->bookName;
	    
            $this->cabiId = trim($body['cabiId']);	    
	    if (strlen($this->cabiId) > 0)
	        $data['cabiId']= $this->cabiId;	    

            $this->cabiSpaceNo = trim($body['cabiSpaceNo']);	    
	    if (strlen($this->cabiSpaceNo) > 0)
	        $data['cabiSpaceNo']= $this->cabiSpaceNo;            
            
           $this->bookNo = trim($body['bookNo']);	         
	   if (strlen($this->bookNo) > 0){
	        $data['bookNo']= $this->bookNo;
                $book_row = $this->book->listData( 0,0,array('bookNo'=>$this->bookNo) );
                if( count($book_row) > 0 ){
                    echo Tools::getResult('0', '该书已经存在！');
                    exit;                      
                }
           }

           $this->bookPic = trim($body['bookPic']);	         
           if (strlen($this->bookPic)>0 )	        
	        $data['bookPic']= $this->bookPic;
           
           
           $this->bookDesc = trim($body['bookDesc']);	         
	   if (strlen($this->bookDesc) > 0)
	        $data['bookDesc']= $this->bookDesc;

           $this->cabiNo = trim($body['cabiNo']);	         
	   if (strlen($this->cabiNo) > 0)
	        $data['cabiNo']= $this->cabiNo;          

           $this->sharePrice = trim($body['sharePrice']);	         
	   if (strlen($this->sharePrice) > 0)
	        $data['sharePrice']= $this->sharePrice;
           
           $data['status']= 0; 
           $this->status = trim($body['status']);	         
	   if (strlen($this->status) > 0)
	        $data['status']= $this->status; 
           
	   
           $rows = $this->cabinet->listData( 0,0,array('cabiNo'=>$this->cabiNo) );
           if( 0 == count($rows) ){
	        echo Tools::getResult('0', '书柜不存在');
                exit;               
           }
           foreach($rows as $k => $v){               
                $data['bookLong']       = $v['cabiLong'];
                $data['bookLat']        = $v['cabiLat']; 
                $data['cabiName']        = $v['cabiName'];
                $data['cabiId']        = $v['cabiId'];
                $data['cabiNo']        = $v['cabiNo'];
            }
	   $data['optTime'] = date('Y-m-d H:i:s');
	   $this->cabiId = $data['cabiId'];
	   /*
            if(!empty($data['bookLong']) && !empty($data['bookLat'])){
                $geohash = new Geohash();
                $data['cabiGeohash'] = $geohash->encode($data['bookLong'],$data['bookLat']);
	   }
           */
	
            if (!$this->hasError()){
                if($this->bookId > 0){
                    $this->book->editData($this->bookId, $data);
                    $data['bookId'] = $this->bookId;                   
                    $this->mbook->update(array('bookId'=>(int)$this->bookId),$this->bookMongoDb($data));       
                }else{
                    $data['creatTime'] = date('Y-m-d H:i:s');
                    $id = $this->book->addData($data);
                    $data['bookId'] = $id;
                    
                    //更新mysql书柜中数量计数
                    $data1['cabiId']    = $this->cabiId;
                    $data1['spaceNum']  = -1;
                    $data1['bookNum']   = 1;
                    $data1['optTime'] = date('Y-m-d H:i:s');
                    $this->cabinet->editData($this->cabiId, $data1);
                    
                    //更新mysql书柜空格状态
                    $where['cabiId'] = $this->cabiId;
                    $where['cabiSpaceNo'] = $this->cabiSpaceNo;
                    
                    $data2['bookId'] = $id;
                    $data2['status'] = 1;
                    $data2['optTime'] = date('Y-m-d H:i:s');
                    $this->cabiSpace->editData($where, $data2);
                    
                    //更新mongo书柜书数量
                    $this->mcabinet->update( array('cabiId'=>(int)$this->cabiId),
                             array('$inc'=>array('bookNum'=>1,'spaceNum'=>-1)));
                    //更新mongo书信息
                    $this->mbook->insert($this->bookMongoDb($data));
                }                
            }
            
            if(!$this->hasError()){
                echo Tools::getResult('1', '操作成功!', array("bookId"=>$data['bookId']));
            }else{
                echo Tools::getResult('0', $this->getErrors());
            }

	}
	private function bookMongoDb($data)
	{
	    $result = array();
	    $result['bookId'] = (int)$data['bookId'];
	    $result['bookNo'] = (int)$data['bookNo'];
	    $result['bookName'] = $data['bookName'];
	    $result['status'] = (int)$data['status'];
            $result['coordinate'] = array(
	        (double)$data['bookLong'],
	        (double)$data['bookLat']
	    ); 
	   return $result;
	}	
	
        /**
	 *  获取书详情
	 */
        public function bookinfoGetAction()
	{
  	    if(empty($this->body['bookId'])){
	        echo Tools::getResult('0', '书ID不能为空');
                exit;
	    }
            $this->bookId = $this->body['bookId'];	    	   

            $bookRows = $this->book->listData( 0,0,array('bookId'=>$this->bookId) );
            foreach($bookRows as $k => $v){
                $bookRows['bookLong']       = $v['bookLong'];
                $bookRows['bookLat']        = $v['bookLat'];
                $bookRows['bookId']         = $v['bookId'];
                $bookRows['cabiSpaceNo']    = $v['cabiSpaceNo'];
                $bookRows['status']         = $v['status'];
                $bookRows['sharePrice']     = $v['sharePrice'];
                $bookRows['cabiNo']         = $v['cabiNo'];
                $bookRows['bookName']       = $v['bookName'];
                $bookRows['bookPic']        = $v['bookPic'];
                $bookRows['cabiName']       = $v['cabiName'];
            }
            
	    echo Tools::getResult('1', '',$bookRows);       
        }
        
        /**
	 *  删除书
	 */
        public function bookinfoDelAction()
	{
	    $id = !empty($body['bookId']) > 0 ? (int)$body['bookId'] : 0;
            if( 0 == $id ){
                $this->bookNo = (int)$this->body['bookNo'];
                $bookRows = $this->book->listData( 0,0,array('bookNo'=>$this->bookNo) );
                if(count($bookRows)<1 ){
                    echo Tools::getResult('0', "该书不存在");
                    exit;                   
                }
                foreach($bookRows as $k => $v){
                    $id = $v['bookId'];
                    $this->cabiId           = $v['cabiId'];
                    $this->cabiSpaceNo      = $v['cabiSpaceNo'];
                    break;
                }

            }else{
                $detail = $this->book->showDetail($id);
                if(count($detail)<1 ){
                    echo Tools::getResult('0', "该书不存在");
                    exit;
                } 
                $this->cabiId           = $detail['cabiId'];
                $this->cabiSpaceNo      = $detail['cabiSpaceNo'];
            }
            
	    if($this->book->delData($id)){               
	        //删除mongo图书
                $this->mbook->remove(array('bookId'=>(int)$id));
                
                //更新mysql书柜中数量计数
                $data1['cabiId']    = $this->cabiId;
                $data1['spaceNum']  = 1;
                $data1['bookNum']   = -1;
                $data1['optTime'] = date('Y-m-d H:i:s');
                $this->cabinet->editData($this->cabiId, $data1);
                    
                //更新mysql书柜空格状态
                $where['cabiId']        = $this->cabiId;
                $where['cabiSpaceNo']   = $this->cabiSpaceNo;

                $data2['bookId'] = 0;
                $data2['status'] = 0;
                $data2['optTime'] = date('Y-m-d H:i:s');
                $this->cabiSpace->editData($where, $data2);
                
                //更新mongo书柜图书数量
                $this->mcabinet->update(array('cabiId'=>(int)$this->cabiId),
                        array('$inc'=>array('bookNum'=>-1,'spaceNum'=>1)));
	        echo Tools::getResult('1', "删除成功");
	    }else{
	        echo Tools::getResult('0', "删除失败");
	    }            
        
        }
        
        /************************************************************/        
        /**
	 *  锁定书
	 */
        public function bookLockAction()
	{            
            $body = $this->body;
            $this->bookId = !empty($body['bookId']) > 0 ? (int)$body['bookId'] : 0;
            
            $bookRows = $this->book->listData( 0,0,array('bookId'=>$this->bookId) );
            if( empty($bookRows) ){
                echo Tools::getResult('0', "该书不存在");
	        exit;
            }

            if( (int)$bookRows[0]['status'] > 1 ){
                echo Tools::getResult('0', "该书已被借出");
	        exit;
            }
            
            $data['userId'] = $this->userId;
            $data['status'] = 2;
            $data['beginTime'] = date('Y-m-d H:i:s');
            $this->book->editData($this->bookId, $data);
            
            $this->mbook->update(array('bookId'=>(int)$this->bookId),
                                    array('status'=>(int)$data['status']));
            //更新书订单状态
            $data['optTime']    = date('Y-m-d H:i:s');
            $data['bookName']   = $bookRows[0]['bookName'];
            $data['bookPic']    = $bookRows[0]['bookPic'];
            $data['bookId']     = $bookRows[0]['bookId'];
            $data['orderNo']    = $data['userId'].Tools::StrOrderOne();
            $data['status']     = 1; //已锁定       
            $data['orderId'] = $this->order->addData($data); 
 
            //返回数据
            $message['status']      = $data['status'];
            $message['orderNo']     = $data['orderNo'];
            //$message['orderId']     = $data['orderId'];
            $message['beginTime']   = $data['beginTime'];
            echo Tools::getResult('1', "", $message);
        }
        
        /**
	 *  一键取书
	*/
        public function bookFetchAction()
	{            
            $body = $this->body;
            $this->bookId = !empty($body['bookId']) > 0 ? (int)$body['bookId'] : 0;
            //订单限制4本判断
            $total = $this->order->total(array('userId'=>$this->userId, 'status'=>3));
            if( $total>3 ){
                echo Tools::getResult('0', "借书不能超过4本");
	        exit;                
            }
            $bookRows = $this->book->listData( 0,0,array('bookId'=>$this->bookId) );
            if( empty($bookRows) ){
                echo Tools::getResult('0', "该书不存在");
	        exit;
            }
            $status = (int)$bookRows[0]['status'];
            if( $status > 2 ){
                echo Tools::getResult('0', "该书已被借出");
	        exit;
            }else if( $status == 2){//被锁定
                if($data['userId'] != $this->userId ){
                    echo Tools::getResult('0', "该书已被预定");
                    exit;                   
                }                
            }else{//可借
                $data['userId'] = $this->userId;
                $data['beginTime'] = date('Y-m-d H:i:s');
            }
            
            //给柜子发送命令
            
            $client = new MsgCenterClient();
            $client->SetSrv(Zend_Registry::get('tcpserver'), Zend_Registry::get('tcpport'));
            $body = "<msg cabiNo=\"".$bookRows[0]['cabiNo']."\" ". 
                              "cabiSpaceNo=\"" .$bookRows[0]['cabiSpaceNo']."\" ". 
                              "bookNo=\"".$bookRows[0]['bookNo']."\" ". 
                              "userId=\"".$bookRows[0]['userId']."\" ".  
                              "optType=\"getBook\" />";
            $reason = "";
            $ret = $client->SendOne2OneMsg($this->userId, $bookRows[0]['cabiNo'], $body,1, $reason);
            if( false == $ret ){
                if( "" == $reason ){
                }else if( "code:400" == $reason ){
                }else if( "code:404" == $reason ){
                }else if( "code:500" == $reason ){
                }
                 //echo Tools::getResult('0', "开锁失败");
                 //exit;             
            } 
            
                                   
            //更新书订单状态
            $order = array();
            if( 2 == $status ){//已经被锁定状态
                 $order['optTime']    = date('Y-m-d H:i:s');
                 $order['status']     = 2;//借阅中
                //$this->order->editData($this->orderNo, $data);
            }else{
                $order['optTime']    = $data['beginTime'];
                $order['beginTime']  = $data['beginTime'];
                $order['userId']     = $data['userId'];
                $order['bookName']   = $bookRows[0]['bookName'];
                $order['bookPic']    = $bookRows[0]['bookPic'];
                $order['bookId']     = $bookRows[0]['bookId'];
                $order['orderNo']    = $data['userId'].Tools::StrOrderOne();
                $order['status']     = 2; //借阅中       
                $order['orderId'] = $this->order->addData($order);                 
            }
          
            //更新书状态
            $data['status'] = 3;
            
            $this->book->editData($this->bookId, $data);
            
            $this->mbook->update(array('bookId'=>(int)$this->bookId),
                                array('$set' => array('status'=>$data['status'])) );
            
            //更新mysql书柜中空格数+1，书的数量不变
            $data1['cabiId']    = $bookRows[0]['cabiId'];
            $data1['spaceNum']  = 1;
            //$data1['bookNum']   = -1;
            $data1['optTime'] = date('Y-m-d H:i:s');
            $this->cabinet->editData($bookRows[0]['cabiId'], $data1);
                    
            //更新mysql书柜空格状态
            $where['cabiId']        = $bookRows[0]['cabiId'];
            $where['cabiSpaceNo']   = $bookRows[0]['cabiSpaceNo'];

            $data2['bookId'] = 0;
            $data2['status'] = 0;
            $data2['optTime'] = date('Y-m-d H:i:s');
            $this->cabiSpace->editData($where, $data2); 
                
            //更新mongo书柜空格数量
            $this->mcabinet->update(array('cabiId'=>(int)$bookRows[0]['cabiId']),
                    array('$inc'=>array('spaceNum'=>1)));
            
            //返回数据
            $message['status']      = $order['status'];
            $message['orderNo']     = $order['orderNo'];
            //$message['orderId']     = $data['orderId'];
            $message['beginTime']   = $order['beginTime'];
            echo Tools::getResult('1', "", $message);      
        }
        
        /**
	 *  返还书
	*/
        public function bookReturnAction()
	{            
            $body = $this->body;
            $this->bookId = !empty($body['bookId']) > 0 ? (int)$body['bookId'] : 0;
      
            $bookRows = $this->book->listData( 0,0,array('bookId'=>$this->bookId) );
            if( empty($bookRows) ){
                echo Tools::getResult('0', "该书不存在");
	        exit;
            }
            $status = (int)$bookRows[0]['status'];
            if( $status != 2 && $status != 3 ){
                echo Tools::getResult('0', "该书已归还");
	        exit;
            }
            if($bookRows[0]['userId'] != $this->userId ){
                echo Tools::getResult('0', "无权操作");
                exit;                   
            } 
            
            $this->cabiId = trim($body['cabiId']);	    
	    if (strlen($this->cabiId) > 0)
	        $data['cabiId']= $this->cabiId;	    
            else{
                echo Tools::getResult('0', "书柜ID为空");
	        exit;
            }
  
            $cabiRows = $this->cabinet->listData( 0,0,array('cabiId'=>$this->cabiId) );
            if( empty($cabiRows) ){
                echo Tools::getResult('0', "柜子不存在");
	        exit;
            }
            $data['cabiNo'] =  $cabiRows[0]['cabiNo'];
            
            $this->cabiSpaceNo = trim($body['cabiSpaceNo']);	    
	    if (strlen($this->cabiSpaceNo) > 0)
	        $data['cabiSpaceNo']= $this->cabiSpaceNo;
            else{
                echo Tools::getResult('0', "书柜编号为空");
	        exit;
            } 
            
            $cabiSpaceRows = $this->cabiSpace->listData( 0,0,array('cabiId'=>$this->cabiId,'cabiSpaceNo'=>$this->cabiSpaceNo) );
            if( empty($cabiSpaceRows) ){
                echo Tools::getResult('0', "书柜格子编号错误");
	        exit;
            }
            //格子不是被
            if( 0 != $cabiSpaceRows[0]['status'] &&  $this->bookId != $cabiSpaceRows[0]['bookId'] ){
                echo Tools::getResult('0', "格子已被占用，请确认是否正常返还书。");
	        exit;            
            }
            
            $this->orderNo = trim($body['orderNo']);	    
	    if (strlen($this->orderNo) > 0){
        
            }else{
                echo Tools::getResult('0', "订单编号为空");
	        exit;
            }            
            
            $orderRows = $this->order->listData( 0,0,array('orderNo'=>$this->orderNo,'userId'=>$this->userId) );
            if( empty($orderRows) ){
                echo Tools::getResult('0', "订单号不存在");
	        exit;
            }
            $this->orderId = (int)$orderRows[0]['orderId'];
            
            //价格
             //$date=floor((strtotime($enddate)-strtotime($startdate))/86400);
            //$hour=floor((strtotime($enddate)-strtotime($startdate))%86400/3600);
            //$minute=floor((strtotime($enddate)-strtotime($startdate))%86400/60);
            //$second=floor((strtotime($enddate)-strtotime($startdate))%86400%60);            
            $hour=floor( ( strtotime(date('Y-m-d H:i:s'))-strtotime($orderRows[0]['beginTime'] ) )%86400/3600);
            $price = $hour * (float)$bookRows[0]['sharePrice']/24;
            $price = round($price,2);
            if( 0 == $price ) $price = $bookRows[0]['sharePrice']/2;
            //更新书状态
            $data['status'] = 1;
            $data['optTime'] = date('Y-m-d H:i:s');
            $data['beginTime'] = 0;
            $this->book->editData($this->bookId, $data);
            
            $this->mbook->update(array('bookId'=>(int)$this->bookId),
                               array('$set' => array('status'=>$data['status'])) );
            
            //更新书订单状态                        
            $orderData['payMoney']       = $price;
            $orderData['status']         = 3; //已还
            $orderData['optTime']        = $data['optTime'];
            $orderData['returnTime']     = $data['optTime'];
            $this->order->editData($this->orderId, $orderData);
                        
            //检查cabiId是否变，如果变则原来柜子的书数量-1，新柜子的书数量+1、空余格子数-1
            //不变则空余数-1
            if( $this->cabiId == $bookRows[0]['cabiId'] ){
                
                //更新mysql书柜中空格数+1，书的数量不变
                $data1['cabiId']    = $bookRows[0]['cabiId'];
                $data1['spaceNum']  = -1;
                $data1['optTime'] = date('Y-m-d H:i:s');
                $this->cabinet->editData($bookRows[0]['cabiId'], $data1);
                
                //更新mongo书柜空格数量
                $this->mcabinet->update(array('cabiId'=>(int)$bookRows[0]['cabiId']),
                    array('$inc'=>array('spaceNum'=>-1)));  
                
            }else{
                //原来柜子书的数量-1
                $data1['cabiId']    = $bookRows[0]['cabiId'];
                $data1['bookNum']  = -1;
                $data1['optTime'] = date('Y-m-d H:i:s');
                $this->cabinet->editData($bookRows[0]['cabiId'], $data1);
                //更新mongo书柜空格数量
                $this->mcabinet->update(array('cabiId'=>(int)$bookRows[0]['cabiId']),
                        array('$inc'=>array('bookNum'=>-1)));
                
                //新柜子的书数量+1、空余格子数-1
                $data1['cabiId']    = $bookRows[0]['cabiId'];                
                $data1['bookNum']  = 1;
                $data1['spaceNum']  = -1;
                $data1['optTime'] = date('Y-m-d H:i:s');
                $this->cabinet->editData($this->cabiId, $data1);  
                //更新mongo书柜空格数量
                $this->mcabinet->update(array('cabiId'=>(int)$this->cabiId),
                        array('$inc'=>array('bookNum'=>1,'spaceNum'=>-1)));
                
               
               //更新mysql书柜空格状态
               $where['cabiId']        = $this->cabiId;
               $where['cabiSpaceNo']   = $this->cabiSpaceNo;

               $data2['bookId'] = $this->bookId;
               $data2['status'] = 1;
               $data2['optTime'] = date('Y-m-d H:i:s');
               $this->cabiSpace->editData($where, $data2);                
                
            }                                                

            echo Tools::getResult('1', "", array('shareTime'=>$hour,'price'=>$price));        
        }
        
        /**
	 *  开柜命令 
	 */	        
        public function opencabiAction()
        {
            $body = $this->body;
            $this->bookId = trim($body['bookId']);	    
	    if (strlen($this->bookId) > 0){
	        $data['bookId']= $this->bookId;   
            }else{
                echo Tools::getResult('0', "bookId为空");
	        exit;
            }
            
            $this->cabiId = trim($body['cabiId']);	    
	    if (strlen($this->cabiId) > 0)
	        $data['cabiId']= $this->cabiId;	    
            else{
                echo Tools::getResult('0', "cabiId为空");
	        exit;
            }
            
            $this->cabiSpaceNo = trim($body['cabiSpaceNo']);	    
	    if (strlen($this->cabiSpaceNo) > 0)
	        $data['cabiSpaceNo']= $this->cabiSpaceNo;
            else{
                echo Tools::getResult('0', "书柜编号为空");
	        exit;
            }
            $bookRows = $this->book->listData( 0,0,array('bookId'=>$this->bookId) );
            if( empty($bookRows) ){
                echo Tools::getResult('0', "该书不存在");
	        exit;
            }            
            $cabiRows = $this->cabinet->listData( 0,0,array('cabiId'=>$this->cabiId) );
            if( empty($cabiRows) ){
                echo Tools::getResult('0', "该书柜不存在");
	        exit;
            }
                        
            //给柜子发送命令            
            $client = new MsgCenterClient();
            $client->SetSrv(Zend_Registry::get('tcpserver'), Zend_Registry::get('tcpport'));
            $body = "<msg cabiNo=\"".$cabiRows[0]['cabiNo']."\" ". 
                              "cabiSpaceNo=\"" .$this->cabiSpaceNo."\" ". 
                              "bookNo=\"".$bookRows[0]['bookNo']."\" ". 
                              "userId=\"".$bookRows[0]['userId']."\" ".  
                              "optType=\"getBook\" />";
            $reason = "";
            $ret = $client->SendOne2OneMsg($this->userId, $this->cabiSpaceNo, $body,1, $reason);
            if( false == $ret ){
                if( "" == $reason ){
                }else if( "code:400" == $reason ){
                }else if( "code:404" == $reason ){
                }else if( "code:500" == $reason ){
                }
                 //echo Tools::getResult('0', "开柜失败");
                 //exit;             
            }
            
            echo Tools::getResult('1', '开柜成功');
        }
        /**
	 *  获取订单 
	 */	
        public function ordersAction()
        {
            $page = (int)$this->body['page'];
	    $length = (int)$this->body['length'];
	
	    $page = $page<1 ? 1 : $page;
	    $length = $length<1 ? 1 : $length;
	    $length = $length>100 ? 100 : $length;
	    
            $rows = array();
            $options['userId'] = $this->userId;
            $data = $this->order->listData( 0, 0, $options );
            foreach($data as $k => $v){
                $rows[$k]['orderId']            = $v['orderId'];
                $rows[$k]['lentLong']           = $v['lentLong'];
                $rows[$k]['beginTime']          = $v['beginTime'];
                $rows[$k]['returnTime']         = $v['returnTime'];
                $rows[$k]['payMoney']           = $v['payMoney'];
                $rows[$k]['status']             = $v['status'];
                $rows[$k]['bookName']           = $v['bookName'];
                $rows[$k]['bookPic']            = $v['bookPic'];
                $rows[$k]['bookId']             = $v['bookId'];
                $rows[$k]['orderNo']            = $v['orderNo'];
            }            
            
	    $total = $this->order->total($options);
	    $pageCount = ceil($total/$length);
            	                         
	    $result = array();
	    $result['total'] = $total;
	    $result['pageCount'] = $pageCount;
	    $result['currentPage'] = $page;
	    $result['length'] = $length;
	    $result['rows'] = $rows;
	
	    echo Tools::getResult('1', '',$result);                
        }       
}

?>