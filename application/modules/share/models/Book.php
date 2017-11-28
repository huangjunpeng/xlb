<?php
class Book extends Common
{
	protected  $_name = "book";
	protected  $_primary = 'bookId';
	
	private static function _GetBaseQuery($db , $options)
	{
            $defaults = array(
                'bookName' => '',
                'bookId' =>'',
                'cabiId' =>'',
                'bookNo' =>'',
                'ids' => array()
            );

            foreach ($defaults as $k => $v) {
                    $options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
            }

            $prefix = Zend_Registry::get('dbprefix');

            $select = $db->select();
            $select->from(array('s' => $prefix."book"), array());			

            if(strlen($options['bookId']) > 0){
                $select->where("s.bookId = ?",$options['bookId']);
            }
            
            if(strlen($options['cabiId']) > 0){
                $select->where("s.cabiId = ?",$options['cabiId']);
            }
            if(strlen($options['bookNo']) > 0){
                $select->where("s.bookNo = ?",$options['bookNo']);
            }            
            if(strlen($options['bookName']) > 0){
                $select->where("s.bookName like ?",'%'.$options['bookName'].'%');
            }			

            if(count($options['ids']) > 0){
                $select->where("s.bookId in (".implode(",",$options['ids']).")");
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

            $col = array();
            $col[] = '*';
            $order = 's.'.$this->_primary.' desc';
            if(!empty($options['bookLat']) 
                && !empty($options['bookLong'])
                && !empty($options['mysql'])
            ){
                $col[] = 'GETDISTANCE(bookLat,bookLong,"'
                    .$options['bookLat'].'","'
                    .$options['bookLong'].'") AS bookDistance';
                $order = 'bookDistance asc';
            }

            if( !empty($options['ids']) && count($options['ids']) > 0){
                $order = 'FIND_IN_SET(bookId,"'.implode(",",$options['ids']).'")';
            }

            $db = $this->getAdapter();
            $select = self::_GetBaseQuery($db , $options);
            $select->from(null, $col)
            ->order($order);
                
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
                if( !empty($id['cabiId']) ){
                    $where = $adapter->quoteInto("cabiId=?",$id['cabiId']);;
                } else {
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
