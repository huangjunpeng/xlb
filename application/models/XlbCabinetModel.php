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
     * 主键
     * @var string
     */
    protected  $_key        = 'cabi_id';

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
     * 获取所有书柜
     * @param int $page
     * @param int $pagesize
     * @param string $search
     * @return mixed
     */
    public function getAllCabinet($page = 1, $pagesize = 20, $search = '') {
        $table_1 = XlbSpModel::getInstance()->getDbName();
        $select = $this->getAdapter()->select();
        $select->from($this->_name, 'count(*)');
        if (!empty($search)) {
            $select->where("cabi_name LIKE '%{$search}%'");
        }
        $pages = (int)$this->getAdapter()->fetchOne($select);
        if ($pages == 0) {
            $ret['pages'] = $pages;
            $ret['rows']  = array();
            return $ret;
        }
        $pages = ceil($pages / $pagesize);
        unset($select);
        $fields = array(
            '_id'=>'cabi_id',
            '_no'=>'cabi_no',
            '_space_num'=>'cabi_space_num',
            '_name'=>'cabi_name',
            '_desc'=>'cabi_desc',
            '_long'=>'cabi_long',
            '_lat'=>'cabi_lat',
            '_status'=>'cabi_status',
            'sp_id'
        );
        $select = $this->getAdapter()->select();
        $select->from(array('t'=>$this->_name), $fields)
            ->joinLeft(array('t1'=>$table_1), 't1.sp_id=t.sp_id',array('sp_name'));
        if (!empty($search)) {
            $select->where("cabi_name LIKE '%{$search}%'");
        }
        $select->order('cabi_creattime DESC');
        if ($page !== null) {
            $select->limitPage($page, $pagesize);
        }
        $rows = $this->getAdapter()->fetchAll($select);
        $ret['pages'] = $pages;
        $ret['rows']  = $rows;
        return $ret;
    }

    /**
     * @return array
     */
    public function getAllCabinetList() {
        $table_1 = XlbCabispaceModel::getInstance()->getDbName();
        $fields = array(
            '_id'=>'cabi_id',
            '_name'=>'cabi_name'
        );
        $select = $this->getAdapter()->select();
        $select->from(array('t'=>$this->_name), $fields)
            ->joinLeft(array('t1'=>$table_1), 't1.cabi_id=t.cabi_id',array('casp'=>'count(t1.cabi_id)'))
            ->where('t1.cs_status=0')
            ->group('t1.cabi_id')
            ->order('cabi_creattime DESC');
        $rows = $this->getAdapter()->fetchAll($select);
        return $rows;
    }

    /**
     * 获取书柜信息
     * @param $id
     * @return mixed
     */
    public function getOneCabinetById($id) {
        $table_1 = XlbSpModel::getInstance()->getDbName();
        $fields = array(
            '_id'=>'cabi_id',
            '_no'=>'cabi_no',
            '_space_num'=>'cabi_space_num',
            '_name'=>'cabi_name',
            '_desc'=>'cabi_desc',
            '_long'=>'cabi_long',
            '_lat'=>'cabi_lat',
            '_status'=>'cabi_status',
            'sp_id'
        );
        $select = $this->getAdapter()->select();
        $select->from(array('t'=>$this->_name), $fields)
            ->joinLeft(array('t1'=>$table_1), 't1.sp_id=t.sp_id',array('sp_name'))
            ->where('cabi_id=?',$id);
        $row = $this->getAdapter()->fetchRow($select);
        return $row;
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
     * 删除数据
     * @param $id int
     * @return int
     */
    public function delCabinetById($id) {
        $db = $this->getAdapter();
        $where = $db->quoteInto($this->_key."=?", $id);
        return $this->delete($where);
    }

    /**
     * 获取附件柜子列表
     * @param $b_id
     * @param $long
     * @param $lat
     * @return mixed
     */
    public function getCabiList($long, $lat) {
        $select = $this->getAdapter()->select();
        $select->from(array('t'=>$this->_name),array(
            '_id' => 't.cabi_id',
            '_name' => 't.cabi_name',
            '_desc' => 't.cabi_desc',
            '_distance' => 'getDistance(t.cabi_long, t.cabi_lat, "' . $long . '", "' . $lat . '")'
        ))->order('_distance ASC');
        $row = $this->getAdapter()->fetchAll($select);
        return $row;
    }
}