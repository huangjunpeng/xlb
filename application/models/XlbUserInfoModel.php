<?php
class XlbUserInfoModel extends Xlb
{
    /**
     * 表名
     * @var string
     */
    protected  $_name       = "user_info";

    /**
     * 主键
     * @var string
     */
    protected  $_primary    = 'u_id';

    /**
     * @var string
     */
    protected  $_key        = 'u_id';

    /**
     * @var XlbUserInfoModel
     */
    public static $_instance = null;

    /**
     * @return XlbUserInfoModel
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
    public function editData($id,$array) {
        $db = $this->getAdapter();
        $where = $db->quoteInto($this->_key."=?", $id);
        return $this->update($array, $where);
    }

    /**
     * @param $u_id
     * @return mixed
     */
    public function getInfoById($u_id) {
        $select = $this->getAdapter()->select();
        $select->from($this->_name,
            array(
                'uid'=>'u_id',
                'nickname'=>'u_nickname',
                'mobile'=>'u_mobile',
                'picture'=>'u_picture'
            ))
            ->where('u_id=?',$u_id);
        $row = $this->getAdapter()->fetchRow($select);
        return $row;
    }

    /**
     * @param $u_id
     * @return mixed
     */
    public function getUserCount($u_id) {
        //获取借阅数
        $count['borrow'] = XlbOrderModel::getInstance()
            ->getCountByUid($u_id);

        //想看数
        $count['love']  = XlbMeWishListModel::getInstance()
            ->getCountByUid($u_id);

        //评论数
        $count['comment'] = XlbCommentModel::getInstance()
            ->getCountByUid($u_id);
        return $count;
    }
}