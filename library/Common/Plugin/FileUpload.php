<?php
require_once 'Zend/Controller/Plugin/Abstract.php';

class Common_Plugin_FileUpload extends Zend_Controller_Plugin_Abstract
{
	public $upload_path='./upload/';//上传文件的路径
	public $allow_type=array();//允许上传的文件类型
	public $max_size='20480';//允许的最大文件大小
	public $overwrite=false;//是否设置成覆盖模式
	public $renamed=false;//是否直接使用上传文件的名称，还是系统自动命名

	/**
	* 私有变量
	*/
	private $upload_file=array();//保存上传成功文件的信息
	private $upload_file_num=0;//上传成功文件的数目
	private $succ_upload_file=array();//成功保存的文件信息
	/**
	* 构造器
	*
	* @param string $upload_path
	* @param string $allow_type
	* @param string $max_size
	*/
	public function __construct($upload_path='./upload/',$allow_type='jpg|bmp|png|gif|jpeg',$max_size='204800')
	{
		$this->set_upload_path($upload_path);
		$this->set_allow_type($allow_type);
		$this->max_size=$max_size;
		$this->get_upload_files();
	}
	/**
	* 设置上传路径，并判定
	*
	* @param string $path
	*/
	public function set_upload_path($path)
	{
		if(file_exists($path))
		{
			if(is_writeable($path))
			{
				$this->upload_path=$path;
			}
			else
			{
				if(@chmod($path,'0666'))
				$this->upload_path=$path;
			}
		}
		else
		{
			if(@mkdir($path,'0666'))
			{
				$this->upload_path=$path;
			}
		}
	}
	//设置上传文件类型
	public function set_allow_type($types)
	{
		$this->allow_type=explode("|",$types);
	}
	//上传文件
	public function get_upload_files()
	{
		foreach ($_FILES AS $key=>$field)
		{
			$this->get_upload_files_detial($key);
		}
	}
	//上传文件数据存放到数组中
	public function get_upload_files_detial($field)
	{
		if(is_array($_FILES["$field"]['name']))
		{
			for($i=0;$i<count($_FILES[$field]['name']);$i++)
			{
				if(0==$_FILES[$field]['error'][$i])
				{		
					$this->upload_file[$this->upload_file_num]['name']=$_FILES[$field]['name'][$i];
					$this->upload_file[$this->upload_file_num]['type']=$_FILES[$field]['type'][$i];
					$this->upload_file[$this->upload_file_num]['size']=$_FILES[$field]['size'][$i];
					$this->upload_file[$this->upload_file_num]['tmp_name']=$_FILES[$field]['tmp_name'][$i];
					$this->upload_file[$this->upload_file_num]['error']=$_FILES[$field]['error'][$i];
					$this->upload_file_num++;
				}
			}
		}
		else 
		{
			if(0==$_FILES["$field"]['error'])
			{
				$this->upload_file[$this->upload_file_num]['name']=$_FILES["$field"]['name'];
				$this->upload_file[$this->upload_file_num]['type']=$_FILES["$field"]['type'];
				$this->upload_file[$this->upload_file_num]['size']=$_FILES["$field"]['size'];
				$this->upload_file[$this->upload_file_num]['tmp_name']=$_FILES["$field"]['tmp_name'];
				$this->upload_file[$this->upload_file_num]['error']=$_FILES["$field"]['error'];
				$this->upload_file_num++;
			}
		}
	}
	/**
	* 检查上传文件是构满足指定条件
	*
	*/
	public function check($i)
	{
		if(!empty($this->upload_file[$i]['name']))
		{
			//检查文件大小
			if($this->upload_file[$i]['size']>$this->max_size*1024)$this->upload_file[$i]['error']=2;
			//设置默认服务端文件名
			$this->upload_file[$i]['filename']=$this->upload_path.$this->upload_file[$i]['name'];
			//获取文件路径信息
			$file_info=pathinfo($this->upload_file[$i]['name']);
			//获取文件扩展名
			$file_ext=$file_info['extension'];
			//检查文件类型
			if(!in_array($file_ext,$this->allow_type))$this->upload_file[$i]['error']=5;
			//需要重命名的
			if($this->renamed)
			{
				list($usec, $sec) = explode(" ",microtime());
				$this->upload_file[$i]['filename']=$sec.substr($usec,2).'.'.$file_ext;
				unset($usec);
				unset($sec);
			}
			//检查文件是否存在
			if(file_exists($this->upload_file[$i]['filename']))
			{
				if($this->overwrite)
				{
					@unlink($this->upload_file[$i]['filename']);
				}
				else
				{
					$j=0;
					do
					{
						$j++;
						$temp_file=str_replace('.'.$file_ext,'('.$j.').'.$file_ext,$this->upload_file[$i]['filename']);
					}while (file_exists($temp_file));
					$this->upload_file[$i]['filename']=$temp_file;
					unset($temp_file);
					unset($j);
				}
			}
			//检查完毕
		} 
		else $this->upload_file[$i]['error']=6;
	}
	/**
	* 上传文件
	*
	* @return true
	*/
	public function upload()
	{
		$upload_msg='';
		for($i=0;$i<$this->upload_file_num;$i++)
		{
			if(!empty($this->upload_file[$i]['name']))
			{
				//检查文件
				$this->check($i);
				if (0==$this->upload_file[$i]['error'])
				{
					//上传文件
					if(!@move_uploaded_file($this->upload_file[$i]['tmp_name'],$this->upload_file[$i]['filename']))
					{
						$upload_msg.='上传文件'.$this->upload_file[$i]['name'].' 出错:'.$this->error($this->upload_file[$i]['error']).'!<br>';
					}
					else
					{ 
						//$this->succ_upload_file[]=$this->upload_file[$i]['filename'];//带路径的文件名
						$this->succ_upload_file[]=$this->upload_file[$i]['name'];//文件名
						$upload_msg.='上传文件'.$this->upload_file[$i]['name'].' 成功了<br>';
					}
				}
				else 
				$upload_msg.='上传文件'.$this->upload_file[$i]['name'].' 出错:'.$this->error($this->upload_file[$i]['error']).'!<br>';
			}
		}
		//echo $upload_msg;
	}
	//错误信息
	public function error($error)
	{
		switch ($error) 
		{
			case 1:
			return '文件大小超过php.ini 中 upload_max_filesize 选项限制的值';
			break;
			case 2:
			return '文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值';
			break;
			case 3:
			return '文件只有部分被上传';
			break;
			case 4:
			return '没有文件被上传';
			break;
			case 5:
			return '这个文件不允许被上传';
			break;
			case 6:
			return '文件名为空';
			break;
			default:
			return '出错';
			break;
		}
	}
	//获取成功的数据信息为数组(备用)
	public function get_succ_file()
	{
		return $this->succ_upload_file;
	}
}
?>