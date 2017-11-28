<?php
class Xlb extends Zend_Db_Table
{
	public function __construct()
	{
		$dbprefix = Zend_Registry::get('dbprefix');
		$this->_name = $dbprefix.$this->_name;
		parent::__construct();
	}

    /**
     * @param $id
     * @return null|Zend_Db_Table_Row_Abstract
     */
	public function getRowByID($id) {
	    return $this->find($id);
    }
}
