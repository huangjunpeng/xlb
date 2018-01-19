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
}