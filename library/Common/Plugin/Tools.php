<?php
class Tools
{
	//文件下载函数
	public static function download($file)
	{
		//First, see if the file exists
		if (!is_file($file)) { die("<b>404 File not found!</b>"); }
	
		//Gather relevent info about file
		$len = filesize($file);
		$filename = basename($file);
		$file_extension = strtolower(substr(strrchr($filename,"."),1));
	
		//This will set the Content-Type to the appropriate setting for the file
		switch( $file_extension ) {
		  case "pdf": $ctype="application/pdf"; break;
		  case "exe": $ctype="application/octet-stream"; break;
		  case "zip": $ctype="application/zip"; break;
		  case "doc": $ctype="application/msword"; break;
		  case "xls": $ctype="application/vnd.ms-excel"; break;
		  case "ppt": $ctype="application/vnd.ms-powerpoint"; break;
		  case "gif": $ctype="image/gif"; break;
		  case "png": $ctype="image/png"; break;
		  case "jpeg":
		  case "jpg": $ctype="image/jpg"; break;
		  case "mp3": $ctype="audio/mpeg"; break;
		  case "wav": $ctype="audio/x-wav"; break;
		  case "mpeg":
		  case "mpg":
		  case "mpe": $ctype="video/mpeg"; break;
		  case "mov": $ctype="video/quicktime"; break;
		  case "avi": $ctype="video/x-msvideo"; break;
	
		  //The following are for extensions that shouldn't be downloaded (sensitive stuff, like php files)
		  case "php":
		  case "htm":
		  case "html":
		  case "txt": die("<b>Cannot be used for ". $file_extension ." files!</b>"); break;
	
		  default: $ctype="application/force-download";
		}
	
		//Begin writing headers
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Cache-Control: public"); 
		header("Content-Description: File Transfer");
		
		//Use the switch-generated Content-Type
		header("Content-Type: $ctype");
	
		//Force the download
		$header="Content-Disposition: attachment; filename=".$filename.";";
		header($header );
		header("Content-Transfer-Encoding: binary");
		header("Content-Length: ".$len);
		@readfile($file);
		exit;
	}
	
	/**
	 * 产生随机字串，字母和数字混合
	 *
	 * @param string $len		长度
	 * @param string $type		字串类型 (0 字母 1 数字 其它 混合)
	 * @param string $addChars	额外字符
	 * @return string
	 */
	public static function rand($len=4,$type='',$addChars='') {
	    $str ='';
	    switch($type) {
	        case 0:
	            $chars='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'.$addChars;
	            break;
	        case 1:
	            $chars= str_repeat('0123456789',3);
	            break;
	        case 2:
	            $chars='ABCDEFGHIJKLMNOPQRSTUVWXYZ'.$addChars;
	            break;
	        case 3:
	            $chars='abcdefghijklmnopqrstuvwxyz'.$addChars;
	            break;
	        default :
	            // 默认去掉了容易混淆的字符oOLl和数字01，要添加请使用addChars参数
	            $chars='ABCDEFGHIJKMNPQRSTUVWXYZabcdefghijkmnpqrstuvwxyz23456789'.$addChars;
	            break;
	    }
	    if($len>10 ) {//位数过长重复字符串一定次数
	        $chars= $type==1? str_repeat($chars,$len) : str_repeat($chars,5);
	    }
	    if($type!=4) {
	        $chars   =   str_shuffle($chars);
	        $str     =   substr($chars,0,$len);
	    }else{
	        // 中文随机字
	        for($i=0;$i<$len;$i++){
	            $str.= substr($chars, floor(mt_rand(0,mb_strlen($chars,'utf-8')-1)),1);
	        }
	    }
	    return $str;
	}
        
        public static function StrOrderOne(){
            /* 选择一个随机的方案 */
            mt_srand((double) microtime() * 1000000);     
            return date('Ymd') . str_pad(mt_rand(1, 9999999), 7, '0', STR_PAD_LEFT);
        }
        
	public static function between_date($date,$t='d',$n=0)
	{
		if($t=='d')
		{
			$firstday = date('Y-m-d 00:00:00',strtotime("$n day"));
			$lastday = date("Y-m-d 23:59:59",strtotime("$n day"));
		}
		elseif($t=='w')
		{
			if($n!=0){$date = date('Y-m-d',strtotime("$n week"));}
			$lastday = date("Y-m-d 00:00:00",strtotime("$date Sunday"));
			$firstday = date("Y-m-d 23:59:59",strtotime("$lastday -6 days"));
		}
		elseif($t=='m')
		{
			if($n!=0){$date = date('Y-m-d',strtotime("$n months"));}
			$firstday = date("Y-m-01 00:00:00",strtotime($date));
			$lastday = date("Y-m-d 23:59:59",strtotime("$firstday +1 month -1 day"));
		}
		return array($firstday,$lastday);
	}	
	
	/*将数组转换为对象*/
	public static function array2object($array) 
	{
	    if (is_array($array)) {
	        $obj = new StdClass();
	        foreach ($array as $key => $val){
	            $obj->$key = is_array($array) ? self::array2object($val) : $val;
	        }
	    } else { 
	        $obj = $array; 
	    }
	    return $obj;
	}
	
	/*将对象转换为数组*/
	public static function object2array($object) 
	{
	    $array = array();
	    if (is_object($object)) {
	        foreach ($object as $key => $value) {
	            $array[$key] = is_object($object) ? self::object2array($value) : $value;
	        }
	    }else {
	        $array = $object;
	    }
	    return $array;
	}	
	
	public static function getParam($param = array(), $key = '')
	{
	    $obj = json_decode($param);
	    $arr = self::object2array($obj);
	    if(empty($key)){
	        return $arr;
	    }else{// if(in_array($key, $arr))
	        return $arr[$key];
	    }
	}
	
	public static function getDecodeUid($param = array())
	{
	    $token = self::getParam($param,'token');
	    $des = new STD3Des();
	    $userId = !empty($token) ? $des->decrypt(base64_decode($token)) : '';
	    return $userId;
	}
	
	public static function getDecodeUidForToken($token = '')
	{
	    $des = new STD3Des();
	    $userId = !empty($token) ? $des->decrypt(base64_decode($token)) : '';
	    return $userId;
	}
	
	public static function getEncodeUid($userId = '')
	{
	    $des = new STD3Des();
	    $token = base64_encode($des->encrypt($userId));
	    return $token;
	}
	
	public static function getDecodeBody($param = array())
	{
	    return self::getParam($param,'body');
	}	
	
	/**
	 *     响应结果信息
	 *     
	 *    @param   $head       类型
	 *    @param   $message    提示信息
	 *    @param   $body       消息体
	 *    @return  string   
	 */
	public static function getResult($head = '1',$message = '',$body = array())
	{
	    $res = array();
	    
	    if($head == '1'){
	        $message = !empty($message) ? $message : '请求成功!';
	        $res = array('code'=>'1','message'=>$message);
	    }else if($head == '0'){
	        $message = !empty($message) ? $message : '请求失败!';
	        $res = array('code'=>'0','message'=>$message);
	    }

	    if(!empty($body)){
	        $res['data'] = $body;
	    } else {
            $res['data'] = null;
        }
	    
	    return json_encode($res);
	}
	
	/**
	 *     根据经纬度计算距离 其中A($lat1,$lng1)、B($lat2,$lng2) 
	 */
	public static function getDistance($lat1, $lng1, $lat2, $lng2) 
	{
	    //地球半径
	    $R = 6378137;
	    //将角度转为狐度
	    $radLat1 = deg2rad($lat1);
	    $radLat2 = deg2rad($lat2);
	    $radLng1 = deg2rad($lng1);
	    $radLng2 = deg2rad($lng2);
	    //结果
	    $s = acos(cos($radLat1)*cos($radLat2)*cos($radLng1-$radLng2)+sin($radLat1)*sin($radLat2))*$R;
	    //精度
	    $s = round($s* 10000)/10000;
	    return  round($s);
	}	
	
}
?>