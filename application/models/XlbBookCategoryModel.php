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
}