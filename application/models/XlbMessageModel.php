<?php
class XlbMessageModel extends Xlb
{
    /**
     * 表名
     * @var string
     */
    protected  $_name       = "message";

    /**
     * 主键
     * @var string
     */
    protected  $_primary    = 'm_id';

    /**
     * 主键
     * @var string
     */
    protected  $_key        = 'm_id';

    const REGISTER_MESSAGE          = 1;
    const PAYMENT_SUCCESS_MESSAGE   = 2;
    const PAYMENT_FAILED_MESSAGE    = 3;
    const PAYMENT_DEPOSIT_MESSAGE   = 4;
    const RETURN_DEPOSIT_MESSAGE    = 5;
    const PAYMENT_MEMBER_MESSAGE    = 6;
    const XLB_MESSAGE               = 100;

    /**
     * 系统消息
     * @var string
     */
    static public $_sysmsg = array(
        self::REGISTER_MESSAGE          => '恭喜你成为小萝卜注册用户，从此开启您孩子阅读的新旅程。',
        self::PAYMENT_SUCCESS_MESSAGE   => '本次支付成功。',
        self::PAYMENT_FAILED_MESSAGE    => '本次支付失败，请重新支付。',
        self::PAYMENT_DEPOSIT_MESSAGE   => '你已为该账号交付押金，可以通过app借阅绘本了。',
        self::RETURN_DEPOSIT_MESSAGE    => '押金已退还，无法享受小萝卜平台服务。请重新支付押金。',
        self::PAYMENT_MEMBER_MESSAGE    => '购买会员成功。',
        self::XLB_MESSAGE               => '小萝卜消息'
    );


    /**
     * @var XlbMessageModel
     */
    public static $_instance = null;

    /**
     * @return XlbMessageModel
     */
    public static function getInstance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new static();
        }
        return self::$_instance;
    }

    /**
     * @param $title
     * @param $content
     * @param $type
     * @param $uid
     * @return bool
     */
    public function addMessage($title, $content, $type, $uid){
        $message['m_title']     = $title;
        $message['m_content']   = $content;
        $message['m_type']      = $type;
        $message['u_id']        = $uid;
        $message['m_creattime'] = time();
        $id = $this->insert($message);
        return $id > 0 ? true : false;
    }

    /**
     * 设置已读
     * @param $id
     * @return int
     */
    public function setRead($id) {
        $db = $this->getAdapter();
        $where = $db->quoteInto($this->_key."=?", $id);
        return $this->update(array('m_status' => 1), $where);
    }

    /**
     * @param $uid
     * @param $status
     * @param int $page
     * @param int $pagesize
     * @return mixed
     */
    public function getMessageByuid($uid, $status, $page = 1, $pagesize = 20){
        $select  =  $this->getAdapter()->select();
        $select->from(array('t'=>$this->_name),'count(*)')
            ->where('t.u_id=?',$uid)
            ->where('t.m_type=?', $status);
        $count = $this->getAdapter()->fetchOne($select);
        if ($count == 0) {
            $ret['pages'] = $count;
            $ret['rows']  = array();
            $ret['count'] = $count;
            return $ret;
        }
        $pages = ceil($count / $pagesize);
        unset($select);
        $select  =  $this->getAdapter()->select();
        $select->from(array('t'=>$this->_name),array('m_id','m_title','m_creattime','m_content','m_type','u_id','m_status'))
            ->where('t.u_id=?', $uid)
            ->where('t.m_type=?', $status)
            ->order('t.m_creattime DESC')
            ->limitPage($page, $pagesize);
        $rows = $this->getAdapter()->fetchAll($select);
        $ret['pages'] = $pages;
        $ret['rows']  = $rows;
        $ret['count'] = $count;
        return $ret;
    }



    /**
     * 获取系统消息
     * @param $code
     * @return mixed
     */
    static public function getMessage($code) {
        return isset(self::$_sysmsg[intval($code)]) ?
            self::$_sysmsg[intval($code)] :
            self::$_sysmsg[100];
    }
}