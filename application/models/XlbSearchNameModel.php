<?php
class XlbSearchNameModel extends Xlb
{
    /**
     * 表名
     * @var string
     */
    protected $_name = "search_name";

    /**
     * 主键
     * @var string
     */
    protected $_primary = 'sn_id';

    /**
     * @var XlbSearchNameModel
     */
    public static $_instance = null;

    /**
     * @return XlbSearchNameModel
     */
    public static function getInstance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new static();
        }
        return self::$_instance;
    }

    /**
     * @param int $pagesize
     * @return array
     */
    public function getHotSearch($pagesize = 10) {
        $fields = array(
            'sn_id',
            'sn_name',
        );
        $select = $this->getAdapter()->select();
        $select->from(array('t'=>$this->_name), $fields)
            ->joinLeft(array('t1'=>$this->_name), 't1.sn_name=t.sn_name',array('number'=>'count(t1.sn_id)'))
            ->group('t1.sn_id')
            ->order('number DESC')
            ->limitPage(1, $pagesize);
        $rows = $this->getAdapter()->fetchAll($select);
        return $rows;
    }
}