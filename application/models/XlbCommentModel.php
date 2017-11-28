<?php
class XlbCommentModel extends Xlb
{
    /**
     * 表名
     * @var string
     */
    protected  $_name       = "comment";

    /**
     * 主键
     * @var string
     */
    protected  $_primary    = 'c_id';

    /**
     * @var XlbCommentModel
     */
    public static $_instance = null;

    /**
     * @return XlbCommentModel
     */
    public static function getInstance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new static();
        }
        return self::$_instance;
    }
}