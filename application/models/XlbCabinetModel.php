<?php
class XlbCabinetModel extends Xlb
{
    /**
     * 表名
     * @var string
     */
    protected  $_name       = "cabinet";

    /**
     * 主键
     * @var string
     */
    protected  $_primary    = 'cabi_id';

    /**
     * @var XlbCabinetModel
     */
    public static $_instance = null;

    /**
     * @return XlbCabinetModel
     */
    public static function getInstance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new static();
        }
        return self::$_instance;
    }

    /**
     * 获取所有书柜
     * @param int $page
     * @param int $pagesize
     * @param string $search
     * @return mixed
     */
    public function getAllCabinet($page = 1, $pagesize = 20, $search = '') {
        $table_1 = XlbSpModel::getInstance()->getDbName();
        $select = $this->getAdapter()->select();
        $select->from($this->_name, 'count(*)');
        if (!empty($search)) {
            $select->where("cabi_name LIKE '%{$search}%'");
        }
        $pages = (int)$this->getAdapter()->fetchOne($select);
        if ($pages == 0) {
            $ret['pages'] = $pages;
            $ret['rows']  = array();
            return $ret;
        }
        $pages = ceil($pages / $pagesize);
        unset($select);
        $fields = array(
            '_id'=>'cabi_id',
            '_no'=>'cabi_no',
            '_space_num'=>'cabi_space_num',
            '_name'=>'cabi_name',
            '_desc'=>'cabi_desc',
            '_long'=>'cabi_long',
            '_lat'=>'cabi_lat',
            '_status'=>'cabi_status',
            'sp_id'
        );
        $select = $this->getAdapter()->select();
        $select->from(array('t'=>$this->_name), $fields)
            ->joinLeft(array('t1'=>$table_1), 't1.sp_id=t.sp_id',array('sp_name'));
        if (!empty($search)) {
            $select->where("cabi_name LIKE '%{$search}%'");
        }
        $select->order('cabi_creattime DESC');
        if ($page !== null) {
            $select->limitPage($page, $pagesize);
        }
        $rows = $this->getAdapter()->fetchAll($select);
        $ret['pages'] = $pages;
        $ret['rows']  = $rows;
        return $ret;
    }
}