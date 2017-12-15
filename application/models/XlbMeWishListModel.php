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
     * @var XlbMeWishListModel
     */
    public static $_instance = null;

    /**
     * @return XlbMeWishListModel
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

    /**
     * 获取我的心愿单
     * @param $uid
     * @param int $page
     * @param int $pagesize
     * @return array
     */
    public function getWishListByUid($uid, $page = 1, $pagesize = 20){
        $table_1 = XlbWishListModel::getInstance()->getDbName();
        $table_2 = XlbBookModel::getInstance()->getDbName();
        $select  =  $this->getAdapter()->select();
        $select->from(array('xmwl'=>$this->_name),'count(*)')
            ->where('xmwl.u_id=?',$uid);
        $pages = $this->getAdapter()->fetchOne($select);
        if ($pages == 0) {
            $ret['pages'] = $pages;
            $ret['rows']  = array();
            return $ret;
        }
        $pages = ceil($pages / $pagesize);
        unset($select);
        $select  =  $this->getAdapter()->select();
        $select->from(array('xmwl'=>$this->_name),'xmwl.mwl_id')
            ->join(
                array('xwl'=> $table_1),
                'xwl.wl_id=xmwl.wl_id',array('wl_id','wl_target_num','wl_now_num','wl_status'))
            ->join(
                array('xb'=> $table_2),
                'xb.b_id=xwl.b_id',array('b_id','b_name','b_picture'))
            ->where('xmwl.u_id=?',$uid)
            ->order('t_c.c_comment_time DESC')
            ->limitPage($page, $pagesize);
        $rows = $this->getAdapter()->fetchAll($select);
        $ret['pages'] = $pages;
        $ret['rows']  = $rows;
        return $ret;
    }
}