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
}
