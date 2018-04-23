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

    /**
     * 系统消息
     * @var string
     */
    static public $_sysmsg = array(
        1 =>'恭喜你成为小萝卜注册用户，从此开启您孩子阅读的新旅程。',
        2 => '本次支付成功。',
        3 => '本次支付失败，请重新支付。',
        4 => '你已为该账号交付押金，可以通过app借阅绘本了。',
        5 => '押金已退还，无法享受小萝卜平台服务。请重新支付押金。',
        6 => '购买会员成功。',
        100 => '小萝卜消息'
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