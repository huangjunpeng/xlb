<?php
class ActivityMiss extends Common
{
	protected  $_name = "activity_miss";
	protected  $_primary = 'misId';
	
	private static function _GetBaseQuery($db , $options)
	{
		$defaults = array(
		    'userId' => '',
		    'actId' => '',
		    'shoId' => ''
		);
	
		foreach ($defaults as $k => $v) {
			$options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
		}
		
		$prefix = Zend_Registry::get('dbprefix');
	
		$select = $db->select();
		$select->from(array('am' => $prefix."activity_miss"), array());
		
		if(strlen($options['userId']) > 0){
		    $select->where("am.userId = ?",$options['userId']);
		}
		
		if(strlen($options['actId']) > 0){
		    $select->where("am.actId = ?",$options['actId']);
		}		
		
		return $select;
	}
	
	//获得记录数
	public function total($options)
	{
		$db = $this->getAdapter();
		$select = self::_GetBaseQuery($db , $options);
		$select->from(null, 'count(*)');
		return $db->fetchOne($select);
	}
	
	//获得记录列表
	public function listData($start,$limit,$options)
	{
		$defaults = array(
				'limit' => 0,
				'start' => 0
		);
	
		foreach ($defaults as $k => $v) {
			$options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
		}
	
		$db = $this->getAdapter();
		$select = self::_GetBaseQuery($db , $options);
		$select->from(null, '*')
		->order('am.'.$this->_primary.' asc');
        if ($limit > 0)
            $select->limit($limit,$start);						
		$result = $db->fetchAll($select);
		return $result;	
	}	
	
	
	/**
	 * 添加数据
	 *
	 * @param array $data
	 * @return int
	 */
	function addData($data)
	{
		return $this->insert($data);
	}	
	
	
	
	/**
	 * 更新数据
	 *
	 * @param int $id
	 * @param array $array
	 */
	function editData($id,$array)
	{
		$db = $this->getAdapter();
		$this->correctPrimary();
		$where = $db->quoteInto($this->_primary."=?", $id);
		return $this->update($array, $where);
	}	
	
	
	/**
	 * 删除数据
	 *
	 * @param int $id
	 * @return bool
	 */
	function delData($id)
	{		
		$adapter = $this->getAdapter();
		$this->correctPrimary();	
		$where = $adapter->quoteInto($this->_primary."=?",$id);		
		return $this->delete($where);
	}	
	
	/**
	 * 根据ID获得一条记录
	 *
	 * @param int $id
	 * @return array
	 */
	public function showDetail($id)
	{
		$log = $this->find($id)->toArray();
		return $log[0];
	}	
	

}
