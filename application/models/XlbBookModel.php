<?php
class XlbBookModel extends Xlb
{
    /**
     * 表名
     * @var string
     */
    protected  $_name       = "book";

    /**
     * 主键
     * @var string
     */
    protected  $_primary    = 'b_id';

    /**
     * @var XlbBookModel
     */
    public static $_instance = null;

    /**
     * @return XlbBookModel
     */
    public static function getInstance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new static();
        }
        return self::$_instance;
    }

    /**
     * @param $_name
     * @param $page
     * @param int $pagesize
     * @return array
     */
    public function searchByName($_name, $page = null, $pagesize = 20){
        $select = $this->getAdapter()->select();
        $select->from(array('t'=>$this->_name), 'count(*)')
            ->where("t.b_name LIKE '%{$_name}%'");
        $pages = $this->getAdapter()->fetchOne($select);
        $pages = ceil($pages / $pagesize);
        unset($select);
        $fields = array(
            'id'=>'b_id',
            'name'=>'b_name',
            'picture'=>'b_picture',
            'age_reading'=>'b_age_reading',
            'author'=>'b_author');
        $select = $this->getAdapter()->select();
        $select->from(array('t'=>$this->_name), $fields)
            ->where("t.b_name LIKE '%{$_name}%'")
            ->order('b_score DESC');
        if ($page !== null) {
            $select->limitPage($page, $pagesize);
        }
        $rows = $this->getAdapter()->fetchAll($select);
        $ret['pages'] = $pages;
        $ret['rows']  = $rows;
        return $ret;
    }
}
