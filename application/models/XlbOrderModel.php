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

    /**
     * 获取用户借阅数
     * @param $uid
     * @return int
     */
    public function getCountByUid($uid) {
        $select = $this->getAdapter()->select();
        $select->from(array('t'=>$this->_name), 'count(*)')
            ->where('u_id=?',$uid)
            ->where('order_type=1');
        return (int)$this->getAdapter()->fetchOne($select);
    }
}