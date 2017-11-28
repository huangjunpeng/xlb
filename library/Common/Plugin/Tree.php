<?php
require_once 'Zend/Controller/Plugin/Abstract.php';
/**
* 通用的树型类，可以生成任何树型结构
*/
class Common_Plugin_Tree extends Zend_Controller_Plugin_Abstract
{
	/**
	* 生成树型结构所需要的2维数组
	* @var array
	*/
	var $arr = array();

	/**
	* 生成树型结构所需修饰符号，可以换成图片
	* @var array
	*/
	var $icon = array('│','├','└');

	/**
	* @access private
	*/
	var $ret = '';
	
	//定义返回的数组
	var $retArr = array();

	/**
	* 构造函数，初始化类
	* @param array 2维数组，例如：
	* array(
	*      1 => array('id'=>'1','parentid'=>0,'name'=>'一级栏目一'),
	*      2 => array('id'=>'2','parentid'=>0,'name'=>'一级栏目二'),
	*      3 => array('id'=>'3','parentid'=>1,'name'=>'二级栏目一'),
	*      4 => array('id'=>'4','parentid'=>1,'name'=>'二级栏目二'),
	*      5 => array('id'=>'5','parentid'=>2,'name'=>'二级栏目三'),
	*      6 => array('id'=>'6','parentid'=>3,'name'=>'三级栏目一'),
	*      7 => array('id'=>'7','parentid'=>3,'name'=>'三级栏目二')
	*      )
	*/
	function tree($arr=array())
	{
       $this->arr = $arr;
	   $this->ret = "";
	   return is_array($arr);
	}

    /**
	* 得到父级数组
	* @param int
	* @return array
	*/
	function get_parent($myid)
	{
		$newarr = array();
		if(!isset($this->arr[$myid])) return false;
		$pid = $this->arr[$myid]['parentid'];
		$pid = $this->arr[$pid]['parentid'];
		if(is_array($this->arr))
		{
			foreach($this->arr as $id => $a)
			{
				if($a['parentid'] == $pid) $newarr[$id] = $a;
			}
		}
		return $newarr;
	}

    /**
	* 得到子级数组
	* @param int
	* @return array
	*/
	function get_child($myid)
	{
		$a = $newarr = array();
		if(is_array($this->arr))
		{
			foreach($this->arr as $id => $a)
			{
				if($a['parentid'] == $myid) $newarr[$id] = $a;
			}
		}
		return $newarr ? $newarr : false;
	}

    /**
	* 得到当前位置数组
	* @param int
	* @return array
	*/
	function get_pos($myid,&$newarr)
	{
		$a = array();
		if(!isset($this->arr[$myid])) return false;
        $newarr[] = $this->arr[$myid];
		$pid = $this->arr[$myid]['parentid'];
		if(isset($this->arr[$pid]))
		{
		    $this->get_pos($pid,$newarr);
		}
		if(is_array($newarr))
		{
			krsort($newarr);
			foreach($newarr as $v)
			{
				$a[$v['id']] = $v;
			}
		}
		return $a;
	}	
	
	

    /**
	* 得到树型结构
	* @param int ID，表示获得这个ID下的所有子级
	* @param string 生成树型结构的基本代码，例如："<option value=\$id \$selected>\$spacer\$name</option>"
	* @param int 被选中的ID，比如在做树型下拉框的时候需要用到
	* @return string
	*/
	function get_tree($myid,$str,$sid=0,$adds='')
	{
		$number=1;
		$child = $this->get_child($myid);
		if(is_array($child))
		{
		    $total = count($child);
			foreach($child as $id=>$a)
			{
				//print_r($id);
				$j=$k='';
				if($number==$total){
					$j .= $this->icon[2];
				}else{
					$j .= $this->icon[1];
					$k = $adds ? $this->icon[0] : '';
				}
				$spacer = $adds ? $adds.$j : '';
				$selected = $id==$sid ? "selected" : '';
				@extract($a);
				eval("\$nstr = \"$str\";");
				$this->ret .= $nstr;
				$this->get_tree($id,$str,$sid,$adds.$k.'&nbsp;');
				$number++;
			}
		}
		return $this->ret;
	}
	
/*---------------------------------------------------------------------------------------------------------------------------------------------------------------*/	
	
	//get_tree函数的原形
	function get_tree_old($myid)
	{
		static $newarr =array();
		$child = $this->get_child($myid);
		if(is_array($child))
		{
			foreach($child as $id=>$a)
			{	
				$newarr[$id]=$a;
				$this->get_tree_old($id);
			}
		}
		return $newarr;
	}

	//get_tree函数的原形,针对jquery easyui处理
	function get_tree_old2($myid)
	{
		$newarr =array();
		$child = $this->get_child($myid);
		if(is_array($child))
		{
			$k = 0;
			foreach($child as $id=>$a)
			{
				//$newarr[$id]=$a;
				$newarr[$k]['id']=$a['id'];
				$newarr[$k]['text']=$a['name'];
				$newarr[$k]['etext']=$a['ename'];
				$newarr[$k]['parentid']=$a['parentid'];
				$newarr[$k]['children'] = $this->get_tree_old2($id);
				$k++;
			}
		}
		return $newarr;
	}

	function get_child2($myid)
	{
		$a = $newarr = array();
		if(is_array($this->arr))
		{
			$k = 0;
			foreach($this->arr as $id => $a)
			{
				if($a['parentid'] == $myid){ 
					$newarr[$k] = $a;
					$k++;
				}
			}
		}
		return $newarr ? $newarr : false;
	}	
	
	/**
	* 求出id上面还有几级分类
	*/
	function get_all_parent($myid)
	{
		static $arr_parent_id;
		if($this->arr[$myid]['parentid']!=0)
		{
			//echo 	$this->arr[$myid]['parentid'] .'<br>';
			$arr_parent_id[] = $this->arr[$myid]['parentid'];
			$this->get_all_parent($this->arr[$myid]['parentid']);
		}
		return $arr_parent_id;
	}


	//get_pos函数的另一种写法
	function get_pos2($myid)
	{
		static $newarr = array();
		static $a = array();
		if(!isset($this->arr[$myid])) return false;
        $newarr[] = $this->arr[$myid];
		if(is_array($newarr))
		{
			krsort($newarr);
			foreach($newarr as $v)
			{
				$a[$v['id']] = $v;
			}
		}
		$pid = $this->arr[$myid]['parentid'];
		if(isset($this->arr[$pid]))
		{
		    $this->get_pos2($pid);
		}		
		
		return $a;
	}	
	
	function get_tree_gai($myid,$str,$sid=0,$adds='')
	{
		$number=1;
		$child = $this->get_child($myid);
		if(is_array($child))
		{
		    $total = count($child);
			foreach($child as $id=>$a)
			{
				//print_r($id);
				$j=$k='';
				if($number==$total){
					$j .= $this->icon[2];
				}else{
					$j .= $this->icon[1];
					$k = $adds ? $this->icon[0] : '';
				}
				$spacer = $adds ? $adds.$j : '';
				$selected = $id==$sid ? "selected" : '';
				@extract($a);
				eval("\$nstr = \"$str\";");
				$this->ret []= $nstr;
				$this->get_tree_gai($id,$str,$sid,$adds.$k.'&nbsp;');
				$number++;
			}
		}
		return $this->ret;
	}	
	
}
?>