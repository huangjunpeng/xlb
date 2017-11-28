<?php
require_once 'Zend/Controller/Plugin/Abstract.php';

class Common_Plugin_SwfUpload extends Zend_Controller_Plugin_Abstract
{
	/*上传路径*/
	private $path = '';
	
	/*域名，返回json数据时用到*/
	private $domain = '';
	
	private $fileType = array();
	
	function __construct($domain, $path, $fileType)
	{
		$this->path = $path;
		$this->domain = $domain;
		$this->fileType = $fileType;
	}
	
	public function upload()
	{
		if (!is_uploaded_file($_FILES["upload_file"]["tmp_name"]) || $_FILES["upload_file"]["error"] != 0) {
			echo "ERROR:invalid upload";
			exit(0);
		}
		$web_path = $this->domain;
		$thumb_path = $this->path;
		$webroot = substr(dirname(__FILE__), 0,-22);
		$upload_path = $webroot.'/'.$thumb_path;	//临时上传目录
		
		$this->mkdirs( $upload_path );
		$file_id = substr(md5($_FILES["upload_file"]["tmp_name"] + rand()*100000),0,8).'_'.time();
		$fname = explode(".",$_FILES["upload_file"]["name"]);
		$fname = $upload_path.'/'.$file_id.'.'.end($fname);
		$data['size'] =number_format($_FILES["upload_file"]["size"]/1024, 2, '.', '');//
		
		$extention = preg_replace( '/.*\.(.*[^\.].*)*/iU','\\1',$_FILES["upload_file"]["name"] );
		$data['extention'] = $extention;//
	
		foreach($this->fileType as $key=>$type)
		{
			if(strtolower($extention)==$type)
			{
				if(in_array( $extention,array('gif','jpg','jpeg','bmp','png')))
				{	
					switch( $type )
					{
						case 'gif':
							$img = imagecreatefromgif( $_FILES["upload_file"]["tmp_name"] );
							break;
						case 'png':
							$img = imagecreatefrompng( $_FILES["upload_file"]["tmp_name"] );
							break;
						case 'bmp':
							$img = imagecreatefrombmp( $_FILES["upload_file"]["tmp_name"] );
							break;
						default:
							$img = imagecreatefromjpeg( $_FILES["upload_file"]["tmp_name"] );
					}
					if(!$img) 
					{
						echo "ERROR:could not create image handle ". $_FILES["upload_file"]["tmp_name"];
						exit(0);
					}
					$width = imageSX($img);
					$height = imageSY($img);
					if(!$width || !$height) 
					{
						echo "ERROR:Invalid width or height";
						exit(0);
					}
					// Build the thumbnail
					$target_width = isset($_POST['twidth'])?$_POST['twidth']:80;
					$target_height = isset($_POST['theight'])?$_POST['theight']:80;
					$target_ratio = $target_width / $target_height;
					$img_ratio = $width / $height;
					if($target_ratio > $img_ratio) 
					{
						$new_height = $target_height;
						$new_width = $img_ratio * $target_height;
					} 
					else 
					{
						$new_height = $target_width / $img_ratio;
						$new_width = $target_width;
					}
					if($new_height > $target_height) 
					{
						$new_height = $target_height;
					}
					if($new_width > $target_width) 
					{
						$new_height = $target_width;
					}
					$thumb_img = ImageCreateTrueColor($target_width, $target_height);
					$fillColor = imagecolorallocate($thumb_img,255,255,255);
					if(!@imagefilledrectangle($thumb_img, 0, 0, $target_width-1, $target_height-1,$fillColor)) 
					{	
						// Fill the image white
						echo "ERROR:Could not fill new image";
						exit(0);
					}
					if(!@imagecopyresampled($thumb_img, $img, ($target_width-$new_width)/2, ($target_height-$new_height)/2, 0, 0, $new_width, $new_height, $width, $height)) 
					{
						echo "ERROR:Could not resize image";
						exit(0);
					}
					if(copy( $_FILES["upload_file"]["tmp_name"],$fname ))
					{
						$thumb_name = 'mid_'.$file_id.'.'.$extention;
						imagejpeg( $thumb_img,$upload_path.'/'.$thumb_name );
						imagedestroy( $thumb_img );
						$thumb_img_url = $web_path.$thumb_path.'/'.$thumb_name;
					}
				}
				elseif(copy( $_FILES["upload_file"]["tmp_name"],$fname ))
				{
					$thumb_img_url = $web_path.'/public/images/file/'.$extention.'.png';
				}
				break;
			}
		}
		if(!isset($thumb_img_url))
		{
			echo "ERROR:fail flie type.";
			exit(0);
		}
		$data['thumb_img'] = $thumb_img_url;
		$data['FILEID'] =  $file_id;//
		//remove file...
		$handle = opendir( $upload_path ); 
		while ( ( $filename = readdir( $handle) )!==false )
		{ 
			if(is_file($filename)&&filemtime($filename)<time()-3600*24*7)
				@unlink($filename);
		}
		ob_end_clean();
		return $data;	
	}
	
	private function mkdirs($dir)
	{    
		return is_dir($dir) or ($this->mkdirs(dirname($dir)) and mkdir($dir, 0777));
	}
}
?>