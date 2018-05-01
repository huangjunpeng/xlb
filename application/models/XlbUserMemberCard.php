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
     * 主键
     * @var string
     */
    protected  $_key        = 'umc_id';

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

    /**
     * 获取我的会员卡
     * @param $uid
     * @return mixed
     */
    public function getMemberByUid($uid) {
        $select = $this->getAdapter()->select();
        $select->from(array('t'=>$this->_name), 't.*')
            ->where('u_id=?',$uid);
        $rows = $this->getAdapter()->fetchAll($select);
        return $rows;
    }
}