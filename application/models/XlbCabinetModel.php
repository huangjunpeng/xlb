<?php
class XlbCabinetModel extends Xlb
{
    /**
     * 表名
     * @var string
     */
    protected  $_name       = "cabinet";

    /**
     * 主键
     * @var string
     */
    protected  $_primary    = 'cabi_id';

    /**
     * @var XlbCabinetModel
     */
    public static $_instance = null;

    /**
     * @return XlbCabinetModel
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
    public function getAllCabinet() {
        $all = $this->fetchAll()->toArray();
        $ret = array();
        foreach ($all as $value) {
            $obj['_id'] = $value['cabi_id'];
            $obj['_no'] = $value['cabi_no'];
            $obj['_space_num'] = $value['cabi_space_num'];
            $obj['_name'] = $value['cabi_name'];
            $obj['_desc'] = $value['cabi_desc'];
            $obj['_long'] = $value['cabi_long'];
            $obj['_lat'] = $value['cabi_lat'];
            $ret[] = $obj;
        }
        return $ret;
    }
}