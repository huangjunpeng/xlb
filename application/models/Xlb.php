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

    /**
     * @return Zend_Db_Adapter_Abstract
     */
    public function beginTransaction(){
        return $this->getAdapter()->beginTransaction();
    }

    /**
     * @return Zend_Db_Adapter_Abstract
     */
    public function commit(){
        return $this->getAdapter()->commit();
    }

    /**
     * @return Zend_Db_Adapter_Abstract
     */
    public function rollBack(){
        return $this->getAdapter()->rollBack();
    }
}
