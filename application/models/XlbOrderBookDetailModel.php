<?php
class XlbOrderBookDetailModel extends Xlb
{
    /**
     * 表名
     * @var string
     */
    protected  $_name       = "order_book_detail";

    /**
     * 主键
     * @var string
     */
    protected  $_primary    = 'obd_id';

    /**
     * @var string
     */
    protected $_key  = 'obd_id';

    /**
     * @var XlbOrderBookDetailModel
     */
    public static $_instance = null;

    /**
     * @return XlbOrderBookDetailModel
     */
    public static function getInstance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new static();
        }
        return self::$_instance;
    }

    /**
     * 更新数据
     * @param $id int
     * @param $array array
     * @return int
     */
    public function editData($order_no,$array){
        $db = $this->getAdapter();
        $where = $db->quoteInto($this->_key."=?", $order_no);
        return $this->update($array, $where);
    }
}