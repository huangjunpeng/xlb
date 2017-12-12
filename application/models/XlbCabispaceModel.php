<?php
class XlbCabispaceModel extends Xlb
{
    /**
     * 表名
     * @var string
     */
    protected  $_name       = "cabispace";

    /**
     * 主键
     * @var string
     */
    protected  $_primary    = 'cs_id';

    /**
     * @var XlbCabispaceModel
     */
    public static $_instance = null;

    /**
     * @return XlbCabispaceModel
     */
    public static function getInstance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new static();
        }
        return self::$_instance;
    }

    /**
     * 添加格子
     * @param $cabi_id
     * @param $cabi_no
     * @param $cabi_space_num
     * @return bool
     * @throws Exception
     */
    public function addCabispace($cabi_id, $cabi_no, $cabi_space_num) {
        $cabi_space_num = (int)$cabi_space_num;
        if ($cabi_space_num <= 0) {
            return true;
        }
        $data['cabi_id']        = $cabi_id;
        $data['cs_creattime']   = time();
        for ($i = 0; $i < $cabi_space_num; ++$i) {
            $data['cs_no'] = $cabi_no.'_'.$i;
            $id = $this->insert($data);
            if ($id <= 0) {
                throw new Exception('添加失败');
            }
        }
        return true;
    }
}