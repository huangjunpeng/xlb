<?php
class XlbUserPayrecoryModel extends Xlb
{
    /**
     * 表名
     * @var string
     */
    protected  $_name       = "user_payrecord";

    /**
     * 主键
     * @var string
     */
    protected  $_primary    = 'record_id';

    /**
     * @var string
     */
    protected  $_key        = 'record_id';

    /**
     * @var XlbUserPayrecoryModel
     */
    public static $_instance = null;

    /**
     * @return XlbUserPayrecoryModel
     */
    public static function getInstance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new static();
        }
        return self::$_instance;
    }


    /**
     * 获取支付记录
     * @param $page
     * @param $pagesize
     * @param $uid
     * @return mixed
     */
    public function getPayList($page, $pagesize, $uid) {
        $select = $this->getAdapter()->select();
        $select->from(array('t'=>$this->_name),'count(*)')
            ->where('t.u_id=?', $uid);
        $pages = $this->getAdapter()->fetchOne($select);
        if ($pages == 0) {
            $ret['pages'] = $pages;
            $ret['rows']  = array();
            return $ret;
        }
        $pages = ceil($pages / $pagesize);
        unset($select);
        $select = $this->getAdapter()->select();
        $select->from(array('t'=>$this->_name), 't.*')
            ->where('t.u_id=?', $uid)
            ->order("t.record_id desc")
            ->limitPage($page, $pagesize);
        $rows = $this->getAdapter()->fetchAll($select);
        $ret['pages'] = $pages;
        $ret['rows']  = $rows;
        return $ret;
    }

    /**
     * 获取会员卡支付记录
     * @param $page
     * @param $pagesize
     * @param $uid
     * @return mixed
     */
    public function getMemberPayList($page, $pagesize, $uid) {
        $table_1 = XlbOrderModel::getInstance()->getDbName();
        $select = $this->getAdapter()->select();
        $select->from(array('t'=>$this->_name),'count(*)')
            ->join(array('t1'=>$table_1), 't.order_id=t1.order_id', array())
            ->where('t.u_id=?', $uid)
            ->where('t1.order_type=?', 4);
        $pages = $this->getAdapter()->fetchOne($select);
        if ($pages == 0) {
            $ret['pages'] = $pages;
            $ret['rows']  = array();
            return $ret;
        }
        $pages = ceil($pages / $pagesize);
        unset($select);
        $select = $this->getAdapter()->select();
        $select->from(array('t'=>$this->_name), 't.*')
            ->join(array('t1'=>$table_1), 't.order_id=t1.order_id', array())
            ->where('t.u_id=?', $uid)
            ->where('t1.order_type=?', 4)
            ->order("t.record_id desc")
            ->limitPage($page, $pagesize);
        $rows = $this->getAdapter()->fetchAll($select);
        $ret['pages'] = $pages;
        $ret['rows']  = $rows;
        return $ret;
    }
}