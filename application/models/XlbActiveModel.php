<?php
class XlbActiveModel extends Xlb
{
    /**
     * 表名
     * @var string
     */
    protected $_name = "active";

    /**
     * 主键
     * @var string
     */
    protected $_primary = 'a_id';

    /**
     * @var string
     */
    protected $_key     = 'a_id';

    /**
     * @var XlbActiveModel
     */
    public static $_instance = null;

    /**
     * @return XlbActiveModel
     */
    public static function getInstance()
    {
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
        foreach ($all as &$value) {
            if ($value['a_position'] == 1) {
                $value['a_position'] = '首页弹框';
            }
        }
        return $all;
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

    /**
     * 删除数据
     * @param $id int
     * @return int
     */
    public function delById($id) {
        $db = $this->getAdapter();
        $where = $db->quoteInto($this->_key."=?", $id);
        return $this->delete($where);
    }

    /**
     * 获取书柜信息
     * @param $id
     * @return mixed
     */
    public function getById($id) {
        $fields = array(
            '_id'=>'a_id',
            '_name'=>'a_name',
            '_link'=>'a_link',
            '_picture'=>'a_picture',
            '_begintime'=>'a_begintime',
            '_endtime'=>'a_endtime',
            '_status'=>'a_status',
            '_position'=>'a_position'
        );
        $select = $this->getAdapter()->select();
        $select->from(array('t'=>$this->_name), $fields)
            ->where('a_id=?',$id);
        $row = $this->getAdapter()->fetchRow($select);
        return $row;
    }

    /**
     * 获取活动列表
     * @param $_status
     * @return array
     */
    public function getListByStaus($page, $pagesize,$_status = 1) {
        $select = $this->getAdapter()->select();
        $select->from(array('t'=>$this->_name),'count(*)')
            ->where('a_status=?',$_status);
        $pages = $this->getAdapter()->fetchOne($select);
        if ($pages == 0) {
            $ret['pages'] = $pages;
            $ret['rows']  = array();
            return $ret;
        }
        $pages = ceil($pages / $pagesize);
        unset($select);
        $select = $this->getAdapter()->select();
        $select->from(
                array('t'=>$this->_name),
                array(
                    '_id'=>'a_id',
                    '_name'=>'a_name',
                    '_link'=>'a_link',
                    '_picture'=>'a_picture',
                    '_begintime'=>'a_begintime',
                    '_endtime'=>'a_endtime',
                    '_status'=>'a_status',
                    '_position'=>'a_position'
                )
            )
            ->where('a_status=?',$_status)
            ->order("a_id desc")
            ->limitPage($page, $pagesize);
        $rows = $this->getAdapter()->fetchAll($select);
        $ret['pages'] = $pages;
        $ret['rows']  = $rows;
        return $ret;
    }
}