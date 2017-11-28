<?php
class XlbUserPayrecoryModel extends Xlb
{
    /**
     * 表名
     * @var string
     */
    protected  $_name       = "user_payrecord";

    /**
     * 主键
     * @var string
     */
    protected  $_primary    = 'record_id';

    /**
     * @var XlbUserPayrecoryModel
     */
    public static $_instance = null;

    /**
     * @return XlbUserPayrecoryModel
     */
    public static function getInstance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new static();
        }
        return self::$_instance;
    }
}