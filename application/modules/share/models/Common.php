<?php
class Common extends Zend_Db_Table
{
	public function __construct()
	{
		$dbprefix = Zend_Registry::get('dbprefix');
		$this->_name = $dbprefix.$this->_name;
		parent::__construct();
	}
	
	public function correctPrimary()
	{
		if(is_array($this->_primary)){
			$this->_primary = $this->_primary[1];
		}		
	}
}
