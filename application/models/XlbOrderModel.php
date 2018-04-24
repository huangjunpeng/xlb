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
     * 主键
     * @var string
     */
    protected  $_key        = 'order_id';

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

    /**
     * 获取订单信息
     * @param $order_no
     * @param $order_type
     * @return mixed
     */
    public function getOrderByOrderNo($order_no, $order_type) {
        $table_1 = XlbOrderBookDetailModel::getInstance()->getDbName();
        $select = $this->getAdapter()->select();
        $select->from(array('t'=>$this->_name), 't.*');
        if ($order_type == 1) {
            $select->joinLeft(array('t1'=>$table_1), 't.order_no=t1.order_no',array(
                'obd_id',
                'obd_returntime',
                'obd_status',
                'sb_id','cs_id',
                'obd_discount_rate',
                'obd_discount_amount',
                'sb_share_price',
                'b_id'
            ));
        }
        $select->where('t.order_no=?', $order_no)
            ->where('t.order_type=?', $order_type);
        $row = $this->getAdapter()->fetchRow($select);
        return $row;
    }

    /**
     * 更新数据
     * @param $id int
     * @param $array array
     * @return int
     */
    public function editData($id,$array) {
        $db = $this->getAdapter();
        $where = $db->quoteInto($this->_key."=?", $id);
        return $this->update($array, $where);
    }
}