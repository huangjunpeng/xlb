<?php
class My_View_Helper_Mbsubstr {
	public $view;
	public function setView(Zend_View_Interface $views) {
		$this->view = $views;
	}
	public function mbsubstr($str, $start=0, $len=36){
		for($i=0;$i<$len;$i++)
	    {
	    	$temp_str=substr($str,0,1);
	    	if(ord($temp_str) > 127)//中文的第一个ascii码大于127
	    	{
	    		$i=$i+2;
	    		if($i<$len)
	    		{
	    			$new_str[]=substr($str,0,3);
	    			$str=substr($str,3);
	    		}
	    	}
	    	else
	    	{
	    		$new_str[]=substr($str,0,1);
	    		$str=substr($str,1);
	    	}
	    }
		return join($new_str);
	}
}
?>
