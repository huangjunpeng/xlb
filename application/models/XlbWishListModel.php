<?php
class XlbWishListModel extends Xlb
{
    /**
     * 表名
     * @var string
     */
    protected  $_name       = "wish_list";

    /**
     * 主键
     * @var string
     */
    protected  $_primary    = 'wl_id';

    /**
     * @var XlbWishListModel
     */
    public static $_instance = null;

    /**
     * @return XlbWishListModel
     */
    public static function getInstance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new static();
        }
        return self::$_instance;
    }
}