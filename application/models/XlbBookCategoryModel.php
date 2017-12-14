<?php
class XlbBookCategoryModel extends Xlb
{
    /**
     * 表名
     * @var string
     */
    protected  $_name       = "book_category";

    /**
     * 主键
     * @var string
     */
    protected  $_primary    = 'bc_id';

    /**
     * @var XlbBookCategoryModel
     */
    public static $_instance = null;

    /**
     * @return XlbBookCategoryModel
     */
    public static function getInstance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new static();
        }
        return self::$_instance;
    }

    /**
     * 获取所有分类
     * @return array
     */
    public function getAllCategorys() {
        return $this->fetchAll()->toArray();
    }

    /**
     * @return array
     */
    public function getCategorys() {
        $table_1 = XlbBookCategoryMapModel::getInstance()->getDbName();
        $table_2 = XlbBookModel::getInstance()->getDbName();
        $select = $this->getAdapter()->select();
        $select->from(array('t'=>$this->_name),array('bc_id','bc_name'))
            ->join(array('t1'=>$table_1),'t.bc_id=t1.bc_id',array())
            ->join(array('t2'=>$table_2),'t1.b_id=t2.b_id',
                array('id'=>'b_id','name'=>'b_name','picture'=>'b_picture','b_score'))
            ->order('b_score DESC');
        return $this->getAdapter()->fetchAll($select);
    }
}