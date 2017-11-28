<?php
class XlbMemberCardModel extends Xlb
{
    /**
     * 表名
     * @var string
     */
    protected  $_name       = "member_card";

    /**
     * 主键
     * @var string
     */
    protected  $_primary    = 'mc_id';

    /**
     * @var XlbMemberCardModel
     */
    public static $_instance = null;

    /**
     * @return XlbMemberCardModel
     */
    public static function getInstance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new static();
        }
        return self::$_instance;
    }
}