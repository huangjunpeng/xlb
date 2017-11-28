<?php
class CabinetSpace extends Common
{
	protected  $_name = "cabiSpace";
	protected  $_primary = 'cabiSpaceId';
	
	private static function _GetBaseQuery($db , $options)
	{
		$defaults = array(
		    'cabiSpaceId' => ''
		);
	
		foreach ($defaults as $k => $v) {
			$options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
		}
		
		$prefix = Zend_Registry::get('dbprefix');
	
		$select = $db->select();
		$select->from(array('c' => $prefix."cabiSpace"), array());
		
		if(strlen($options['cabiSpaceId']) > 0){
		    $select->where("c.cabiSpaceId = ?",$options['cabiSpaceId']);
		}		
		if(strlen($options['cabiId']) > 0){
		    $select->where("c.cabiId = ?",$options['cabiId']);
		}		
		if(strlen($options['cabiNo']) > 0){
		    $select->where("c.cabiNo = ?",$options['cabiNo']);
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
		->order('c.'.$this->_primary.' asc');
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
            $where1 = $db->quoteInto('cabiId=?', $id['cabiId'] );
            $where2 = $db->quoteInto('cabiSpaceNo=?', $id['cabiSpaceNo'] );
            $where = $where1.' AND '.$where2;
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
                        
            if(!empty($id['cabiId'])){
                $where = $adapter->quoteInto("cabiId=?",$id['cabiId']);;
            } else{
                $this->correctPrimary();
                $where = $adapter->quoteInto($this->_primary."=?",$id);
            }
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
