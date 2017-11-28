<?php
class XlbCabispaceModel extends Xlb
{
    /**
     * 表名
     * @var string
     */
    protected  $_name       = "cabispace";

    /**
     * 主键
     * @var string
     */
    protected  $_primary    = 'cs_id';

    /**
     * @var XlbCabispaceModel
     */
    public static $_instance = null;

    /**
     * @return XlbCabispaceModel
     */
    public static function getInstance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new static();
        }
        return self::$_instance;
    }
}