<?php
class XlbUserMemberCard extends Xlb
{
    /**
     * 表名
     * @var string
     */
    protected  $_name       = "user_member_card";

    /**
     * 主键
     * @var string
     */
    protected  $_primary    = 'umc_id';

    /**
     * @var XlbUserMemberCard
     */
    public static $_instance = null;

    /**
     * @return XlbUserMemberCard
     */
    public static function getInstance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new static();
        }
        return self::$_instance;
    }
}