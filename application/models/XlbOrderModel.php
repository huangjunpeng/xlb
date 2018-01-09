<?php
class XlbOrderModel extends Xlb
{
    /**
     * 表名
     * @var string
     */
    protected  $_name       = "order";

    /**
     * 主键
     * @var string
     */
    protected  $_primary    = 'order_id';

    /**
     * @var XlbOrderModel
     */
    public static $_instance = null;

    /**
     * @return XlbOrderModel
     */
    public static function getInstance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new static();
        }
        return self::$_instance;
    }
}