<?php
class XlbSpModel extends Xlb
{
    /**
     * 表名
     * @var string
     */
    protected  $_name       = "sp";

    /**
     * 主键
     * @var string
     */
    protected  $_primary    = 'sp_id';

    /**
     * @var XlbSpModel
     */
    public static $_instance = null;

    /**
     * @return XlbSpModel
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
    public function editData($id,$array)
    {
        $db = $this->getAdapter();
        $where = $db->quoteInto($this->_primary."=?", $id);
        return $this->update($array, $where);
    }

    public function getSpByWhere($options)
    {
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