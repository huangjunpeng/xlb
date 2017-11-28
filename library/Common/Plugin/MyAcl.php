<?php
/**
 * Zend_Acl
 */
require_once	'Zend/Acl.php';

/**
 * Zend_Acl_Role
 */
require_once	'Zend/Acl/Role.php';

/**
 *Zend_Acl_Resource
 */
require_once	'Zend/Acl/Resource.php';

/**
 * Access Control List (ACL)
 * @category   Common
 * @package    Common
 * @author     
 * @copyright  Copyright (c) 
 * @license
 */
class Common_Plugin_MyAcl extends Zend_Acl
{
	/**
	 * Constructor.
	 * @return void
	 */
	public function	__construct()
	{	
		$this->addRole(new Zend_Acl_Role('guest'));
		
		//前台权限配置,读取资源文件
		$resource = new	Zend_Config_Ini('./application/configs/resource.ini',null);
		$resourceAarr = $resource->toArray();
		
		//配置default模块
		$this->add(new Zend_Acl_Resource('default'));
		foreach ($resourceAarr['default'] as $key=>$value){
		    $this->add(new Zend_Acl_Resource($value),'default');//default:index,default
		}
		
		//配置角色
		$roleArr = array();
		foreach ($resourceAarr['roles'] as $k => $v){
		    $roleArr[] = $k;
		    //后台权限已经配置guest，无需再次添加
		    if($k != 'guest'){
		        $this->addRole(new Zend_Acl_Role($k),'guest');
		    }
		}
		
		//配置角色权限
		foreach($roleArr as $k => $v)
		{
		    //读取角色可以访问的控制器方法
		    foreach ($resourceAarr[$v] as $k2 => $v2)
		    {
		        $this->allow($v,'default:'.$k2,explode(",",$v2));
		    }
		}		
		

	}
}