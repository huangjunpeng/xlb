<?php
class XlbUserInfoModel extends Xlb
{
    /**
     * 表名
     * @var string
     */
    protected  $_name       = "user_info";

    /**
     * 主键
     * @var string
     */
    protected  $_primary    = 'u_id';

    /**
     * @var XlbUserInfoModel
     */
    public static $_instance = null;

    /**
     * @return XlbUserInfoModel
     */
    public static function getInstance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new static();
        }
        return self::$_instance;
    }
}