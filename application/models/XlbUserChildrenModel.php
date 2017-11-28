<?php
class XlbUserChildrenModel extends Xlb
{
    /**
     * 表名
     * @var string
     */
    protected  $_name       = "user_children";

    /**
     * 主键
     * @var string
     */
    protected  $_primary    = 'uc_id';

    /**
     * @var string
     */
    protected $_key = 'uc_id';

    /**
     * @var XlbUserChildrenModel
     */
    public static $_instance = null;

    /**
     * @return XlbUserChildrenModel
     */
    public static function getInstance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new static();
        }
        return self::$_instance;
    }

    /**
     * @param $uid
     * @return array
     */
    public function getChildrenListByUid($uid) {
        //获取select对象
        $select = $this->getAdapter()->select();
        $select->from($this->_name.' as uc', array('id'=>'uc.uc_id','nickname'=>'uc.uc_nickname','brithday'=>'uc.uc_brithday','sex'=>'uc.uc_sex'));
        $select->where('uc.u_id = ?',$uid);
        $select->order('uc.uc_id');
        return $this->getAdapter()->fetchAll($select->__toString());
    }

    /**
     * 添加数据
     * @param array $data
     * @return int
     */
    public function addData($data)
    {
        return $this->insert($data);
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
     * @param $id
     * @return int
     */
    public function delData($id)
    {
        $db = $this->getAdapter();
        $where = $db->quoteInto($this->_key."=?", $id);
        return $this->delete($where);
    }
}