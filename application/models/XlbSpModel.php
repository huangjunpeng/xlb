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
     * @var string
     */
    protected $_key = 'sp_id';

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
        $where = $db->quoteInto($this->_key."=?", $id);
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

    /**
     * @return array
     */
    public function getAll() {
        $all = $this->fetchAll()->toArray();
        $ret = array();
        foreach ($all as $value) {
            $obj['_id'] = $value['sp_id'];
            $obj['_name'] = $value['sp_name'];
            $obj['_english_name'] = $value['sp_english_name'];
            $obj['_dept'] = $value['sp_dept'];
            $obj['_email'] = $value['sp_email'];
            $obj['_mobile'] = $value['sp_mobile'];
            $obj['role_id'] = $value['role_id'];
            $obj['_status'] = $value['sp_status'];
            $obj['_position'] = $value['sp_position'];
            $obj['_password'] = $value['sp_password'];
            $ret[] = $obj;
        }
        return $ret;
    }

    public function getOne($id){
        $row = $this->getRowByID($id);
        $value = $row->toArray()[0];
        $obj['_id'] = $value['sp_id'];
        $obj['_name'] = $value['sp_name'];
        $obj['_english_name'] = $value['sp_english_name'];
        $obj['_dept'] = $value['sp_dept'];
        $obj['_email'] = $value['sp_email'];
        $obj['_mobile'] = $value['sp_mobile'];
        $obj['role_id'] = $value['role_id'];
        $obj['_status'] = $value['sp_status'];
        $obj['_position'] = $value['sp_position'];
        $obj['_password'] = $value['sp_password'];
        return $obj;
    }

}