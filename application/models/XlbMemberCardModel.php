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
     * @var string
     */
    protected  $_key        = 'mc_id';

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

    /**
     * @return array
     */
    public function getAll() {
        $all = $this->fetchAll()->toArray();
        return $all;
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

    /**
     * 获取书柜信息
     * @param $id
     * @return mixed
     */
    public function getById($id) {
        $fields = array(
            '_id'=>'mc_id',
            '_name'=>'mc_name',
            '_effective_time'=>'mc_effective_time',
            '_max_borrow'=>'mc_max_borrow',
            '_price'=>'mc_price',
            '_type'=>'mc_type',
            '_actual_price'=>'mc_actual_price',
            '_display'=>'mc_display',
            '_status'=>'mc_status'
        );
        $select = $this->getAdapter()->select();
        $select->from(array('t'=>$this->_name), $fields)
            ->where('mc_id=?',$id);
        $row = $this->getAdapter()->fetchRow($select);
        return $row;
    }

    /**
     * 获取所有会员卡
     * @param int $_status
     * @return array
     */
    public function getListBySatus($_status = 1) {
        $select = $this->getAdapter()->select();
        $select->from(
                array('t'=>$this->_name),
                array(
                    '_id'=>'mc_id',
                    '_name'=>'mc_name',
                    '_effective_time'=>'mc_effective_time',
                    '_max_borrow'=>'mc_max_borrow',
                    '_price'=>'mc_price',
                    '_type'=>'mc_type',
                    '_actual_price'=>'mc_actual_price',
                    '_display'=>'mc_display'
                )
            )
            ->where('mc_status=?', $_status)
            ->order("mc_id desc");
        $rows = $this->getAdapter()->fetchAll($select);
        return $rows;
    }
}