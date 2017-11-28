<?php
class XlbMessageModel extends Xlb
{
    /**
     * 表名
     * @var string
     */
    protected  $_name       = "message";

    /**
     * 主键
     * @var string
     */
    protected  $_primary    = 'm_id';

    /**
     * @var XlbMessageModel
     */
    public static $_instance = null;

    /**
     * @return XlbMessageModel
     */
    public static function getInstance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new static();
        }
        return self::$_instance;
    }
}