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
}