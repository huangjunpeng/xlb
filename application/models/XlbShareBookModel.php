<?php
class XlbShareBookModel extends Xlb
{
    /**
     * 表名
     * @var string
     */
    protected $_name = "share_book";

    /**
     * 主键
     * @var string
     */
    protected $_primary = 'sb_id';

    /**
     * @var XlbShareBookModel
     */
    public static $_instance = null;

    /**
     * @return XlbShareBookModel
     */
    public static function getInstance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new static();
        }
        return self::$_instance;
    }

    /**
     * @param $status
     * @param int $page
     * @param int $pagesize
     * @return mixed
     */
    public function getBookByStatus($status, $page = 1, $pagesize = 20) {
        $table_1 = XlbBookModel::getInstance()->getDbName();
        $table_2 = XlbCabispaceModel::getInstance()->getDbName();
        $select = $this->getAdapter()->select();
        $select->from(array('t'=>$this->_name),'count(*)')
            ->join(array('t1'=>$table_1),'t.b_id=t1.b_id',array())
            ->where('t.sb_status=?',$status);
        $pages = $this->getAdapter()->fetchOne($select);
        if ($pages == 0) {
            $ret['pages'] = $pages;
            $ret['rows']  = array();
            return $ret;
        }
        $pages = ceil($pages / $pagesize);
        unset($select);
        $field = array(
            'id'=>'b_id',
            'name'=>'b_name',
            'picture'=>'b_picture'
        );
        $select = $this->getAdapter()->select();
        $select->from(array('t'=>$this->_name),array())
            ->join(array('t1'=>$table_1), 't.b_id=t1.b_id', $field)
            ->join(array('t2'=>$table_2), 't2.sb_id=t.sb_id', array('space_id'=>'t2.cs_id'))
            ->where('t.sb_status=?',$status)
            ->limitPage($page, $pagesize);
        $rows = $this->getAdapter()->fetchAll($select);
        $ret['pages'] = $pages;
        $ret['rows']  = $rows;
        return $ret;
    }

    /**
     * @param int $page
     * @param int $pagesize
     * @param string $search
     * @return mixed
     */
    public function getShareBook($page = 1, $pagesize = 20, $search = '') {
        $table_1 = XlbBookModel::getInstance()->getDbName();
        $table_2 = XlbCabispaceModel::getInstance()->getDbName();
        $table_3 = XlbCabinetModel::getInstance()->getDbName();
        $select = $this->getAdapter()->select();
        $select->from(array('t'=>$this->_name), 'count(*)')
            ->join(array('t1'=>$table_1),'t.b_id=t1.b_id', '');
        if (!empty($search)) {
            $select->where("t1.b_name LIKE '%{$search}%'");
        }
        $totalRows = (int)$this->getAdapter()->fetchOne($select);
        if ($totalRows == 0) {
            $ret['pages'] = 0;
            $ret['rows']  = array();
            return $ret;
        }
        $pages = ceil($totalRows / $pagesize);
        unset($select);
        $select = $this->getAdapter()->select();
        $select->from(array('t'=>$this->_name),
            array('sb_id','sb_number','sb_share_price','sb_status','sb_count'))
            ->join(array('t1'=>$table_1),'t.b_id=t1.b_id', array('b_id','b_name','b_age_reading','b_languages'))
            ->join(array('t2'=>$table_2),'t.sb_id=t2.sb_id', 'cs_no')
            ->join(array('t3'=>$table_3),'t2.cabi_id=t3.cabi_id', 'cabi_no');
        if (!empty($search)) {
            $select->where("b_name LIKE '%{$search}%'");
        }
        $select->order('b_score DESC');
        if ($page !== null) {
            $select->limitPage($page, $pagesize);
        }
        $rows = $this->getAdapter()->fetchAll($select);
        $ret['pages'] = $pages;
        $ret['rows']  = $rows;
        $ret['totalRows'] = $totalRows;
        return $ret;
    }

    /**
     * 获取附件柜子列表
     * @param $b_id
     * @param $long
     * @param $lat
     * @return mixed
     */
    public function getCabiList($b_id, $long, $lat) {
        $table_3 = XlbCabinetModel::getInstance()->getDbName();
        $table_2 = XlbCabispaceModel::getInstance()->getDbName();
        $select = $this->getAdapter()->select();
        $select->from(array('t'=>$this->_name),array())
            ->join(array('t2'=>$table_2), 't.sb_id=t2.sb_id', array(
                'space_id'=>'t2.cs_id'
            ))
            ->join(array('t3'=>$table_3), 't2.cabi_id=t3.cabi_id',array(
                '_id' => 't3.cabi_id',
                '_name' => 't3.cabi_name',
                '_desc' => 't3.cabi_desc',
                '_distance' => 'getDistance(t3.cabi_long, t3.cabi_lat, "' . $long . '", "' . $lat . '")'
            ))
            ->where('t.b_id=?', $b_id)
            ->order('_distance ASC');
        $row = $this->getAdapter()->fetchAll($select);
        return $row;
    }
}