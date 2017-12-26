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

    protected  $_key        = 'wl_id';

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

    /**
     * @param $options
     * @return null|Zend_Db_Table_Row_Abstract
     */
    public function getRowByWhere($options) {
        if (empty($options)) {
            return null;
        }
        $where = '';
        $db = $this->getAdapter();
        $count = 0;
        foreach ($options as $key => $value) {
            if ($count >= 1) {
                $where .= " AND ";
            }
            $where .= $db->quoteInto($key.'=?',$value);
            ++$count;
        }
        return $this->fetchRow($where);
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
     * 获取用户是否把某本书加入心愿单
     * @param $uid
     * @param $b_id
     */
    public function getRowByUidAndBId($uid, $b_id) {
        $table_1 = XlbMeWishListModel::getInstance()->getDbName();
        $select = $this->getAdapter()->select();
        $select->from(array('t'=>$this->_name), '*')
            ->join(array('t1'=>$table_1),'t.wl_id=t1.wl_id', '*')
            ->where('t.b_id=?', $b_id)
            ->where('t1.u_id=?', $uid);
        $row = $this->getAdapter()->fetchRow($select);
        return $row;
    }
}