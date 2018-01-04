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
     * @var string
     */
    protected  $_key        = 'cs_id';

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
            $data['cs_no'] = sprintf("%03d",$i);
            $id = $this->insert($data);
            if ($id <= 0) {
                throw new Exception('添加失败');
            }
        }
        return true;
    }

    /**
     * 删除柜子格子
     * @param $cabi_id
     * @return int
     */
    public function delCabispaceByCabiId($cabi_id){
        $db = $this->getAdapter();
        $where = $db->quoteInto("cabi_id=?", $cabi_id);
        return $this->delete($where);
    }

    /**
     * 获取格子
     * @param $cabid_id
     * @param int $cs_status
     */
    public function getCabispaceByCabiId($cabid_id, $cs_status=null){
        $fields = array(
            'cs_id'=>'cs_id',
            'cs_no'=>'cs_no'
        );
        $select = $this->getAdapter()->select();
        $select->from(array('t'=>$this->_name), $fields)
            ->where('t.cabi_id=?',$cabid_id);
        if (null !== $cs_status) {
            $select->where('t.cs_status=?',$cs_status);
        }
        $rows = $this->getAdapter()->fetchAll($select);
        return $rows;
    }

    /**
     * 更新数据
     * @param $id int
     * @param $array array
     * @return int
     */
    public function editData($id,$array){
        $db = $this->getAdapter();
        $where = $db->quoteInto($this->_key."=?", $id);
        return $this->update($array, $where);
    }
}