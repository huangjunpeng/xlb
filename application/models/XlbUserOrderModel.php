<?php
class XlbUserOrderModel extends Xlb
{
    /**
     * 表名
     * @var string
     */
    protected  $_name       = "user_order";

    /**
     * 主键
     * @var string
     */
    protected  $_primary    = 'order_id';

    /**
     * @var XlbUserOrderModel
     */
    public static $_instance = null;

    /**
     * @return XlbUserOrderModel
     */
    public static function getInstance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new static();
        }
        return self::$_instance;
    }
}