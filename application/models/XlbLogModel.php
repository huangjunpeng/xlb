<?php
class XlbLogModel extends Xlb
{
    /**
     * @var string
     */
    protected  $_name = "log";

    /**
     * @var string
     */
    protected  $_primary = 'log_id';

    /**
     * @var XlbLogModel
     */
    public static $_instance = null;

    /**
     * @return XlbLogModel
     */
    public static function getInstance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new static();
        }
        return self::$_instance;
    }
}