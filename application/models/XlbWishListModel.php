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
    public function editData($id,$array)
    {
        $db = $this->getAdapter();
        $where = $db->quoteInto($this->_key."=?", $id);
        return $this->update($array, $where);
    }
}