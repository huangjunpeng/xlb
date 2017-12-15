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
            ->join(array('t1'=>$table_1),'t.b_id=t1.b_id', $field)
            ->where('t.sb_status=?',$status)
            ->order('b_score DESC')
            ->limitPage($page, $pagesize);
        $rows = $this->getAdapter()->fetchAll($select);
        $ret['pages'] = $pages;
        $ret['rows']  = $rows;
        return $ret;
    }
}