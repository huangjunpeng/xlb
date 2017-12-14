<?php
class XlbBookCategoryMapModel extends Xlb
{
    /**
     * 表名
     * @var string
     */
    protected  $_name       = "book_category_map";


    /**
     * @var XlbBookCategoryMapModel
     */
    public static $_instance = null;

    /**
     * @return XlbBookCategoryMapModel
     */
    public static function getInstance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new static();
        }
        return self::$_instance;
    }

    /**
     * 获取所有（书-分类）映射关系
     * @return array
     */
    public function getAllMap() {
        $select = $this->getAdapter()->select();
        $select->from($this->_name, array('b_id','bc_id'));
        $xbcm = $this->getAdapter()->fetchAll($select->__toString());
        $_xbcm = array();
        foreach ($xbcm as $item) {
            $_xbcm[$item['b_id']] = $item['bc_id'];
        }
        return $_xbcm;
    }

    /**
     * @param $bc_id
     * @param null $page
     * @param int $pagesize
     * @return array
     */
    public function getBookByBcId($bc_id, $page = null, $pagesize = 20) {
        $table_1 = XlbBookModel::getInstance()->getDbName();
        $select = $this->getAdapter()->select();
        $select->from(array('t'=>$this->_name),'count(*)')
            ->join(array('t1'=>$table_1),'t.b_id=t1.b_id',
                array('id'=>'b_id','name'=>'b_name','picture'=>'b_picture'))
            ->where('t.bc_id=?',$bc_id);
        $pages = $this->getAdapter()->fetchOne($select);
        $pages = ceil($pages / $pagesize);
        unset($select);
        $select = $this->getAdapter()->select();
        $select->from(array('t'=>$this->_name),array())
            ->join(array('t1'=>$table_1),'t.b_id=t1.b_id',
                array('id'=>'b_id','name'=>'b_name','picture'=>'b_picture'))
            ->where('t.bc_id=?',$bc_id)
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