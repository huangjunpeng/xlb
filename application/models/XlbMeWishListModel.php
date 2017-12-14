<?php
class XlbMeWishListModel extends Xlb
{
    /**
     * 表名
     * @var string
     */
    protected  $_name       = "me_wish_list";

    /**
     * 主键
     * @var string
     */
    protected  $_primary    = 'mwl_id';

    /**
     * 主键
     * @var string
     */
    protected  $_key        = 'mwl_id';


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
}