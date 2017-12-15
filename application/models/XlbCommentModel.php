<?php
class XlbCommentModel extends Xlb
{
    /**
     * 表名
     * @var string
     */
    protected  $_name       = "comment";

    /**
     * 主键
     * @var string
     */
    protected  $_primary    = 'c_id';

    /**
     * @var XlbCommentModel
     */
    public static $_instance = null;

    /**
     * @return XlbCommentModel
     */
    public static function getInstance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new static();
        }
        return self::$_instance;
    }

    /**
     * @param $b_id
     * @param int $page
     * @param int $pagesize
     * @return array
     */
    public function getCommentByBookId($b_id, $page = 1, $pagesize = 20){
        $table_1 = XlbUserInfoModel::getInstance()->getDbName();
        $select  =  $this->getAdapter()->select();
        $select->from(array('t_c'=>$this->_name),'count(*)')
            ->where('t_c.b_id=?',$b_id);
        $pages = $this->getAdapter()->fetchOne($select);
        if ($pages == 0) {
            $ret['pages'] = $pages;
            $ret['rows']  = array();
            return $ret;
        }
        $pages = ceil($pages / $pagesize);
        unset($select);
        $select  =  $this->getAdapter()->select();
        $select->from(array('t_c'=>$this->_name),array('c_id','c_comment_time','c_content'))
            ->join(array('t_u'=> $table_1), 't_u.u_id=t_c.u_id', array('u_id','u_nickname','u_picture'))
            ->where('t_c.b_id=?',$b_id)
            ->order('t_c.c_comment_time DESC')
            ->limitPage($page, $pagesize);
        $rows = $this->getAdapter()->fetchAll($select);
        $ret['pages'] = $pages;
        $ret['rows']  = $rows;
        return $ret;
    }
}