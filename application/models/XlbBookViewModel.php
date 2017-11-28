<?php
class XlbBookViewModel extends Xlb
{
    /**
     * @var string
     */
    protected  $_name = "book_cs_cabi_view";


    /**
     * @var XlbBookViewModel
     */
    public static $_instance = null;

    /**
     * @return XlbBookViewModel
     */
    public static function getInstance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new static();
        }
        return self::$_instance;
    }

    /**
     * 获得记录列表
     * @param $start    int
     * @param $limit    int
     * @param $status   int
     * @param $long     double
     * @param $lat      double
     * @return array
     */
    public function listData($start, $limit, $status, $long, $lat)
    {
        $col    = array();
        $db     = $this->getAdapter();
        $select = $db->select();
        $select->from(array('s' => $this->_name), array());
        if ($status > 0) {
            $select->where("s.status = ?", $status);
        }
        $fields = array('id', 'name', 'picture','status');
        foreach ($fields as $field) $col[] = $field;
        $col[] = 'getDistance(cabilong, cabilat, "' .$long.'", "' .$lat.'") AS bookDistance';
        $order = 'bookDistance asc';
        $select->from(null, $col)->order($order);
        if ($limit > 0) {
            $select->limit($limit, $start);
        }
        $result = $db->fetchAll($select);
        return $result;
    }

    /**
     * @param $xbc
     * @param $xbcm
     * @param $xbv
     * @return mixed
     */
    public function getAllBook($xbc, $xbcm, $xbv) {
        foreach ($xbv as $item) {
            foreach ($xbc as &$value) {
                if (!array_key_exists('books', $value)) {
                    $value['books'] = array();
                }
                if (isset($xbcm[$item['id']]) && $xbcm[$item['id']] == $value['bc_id']) {
                    $value['books'][] = $item;
                }
            }
        }
        return $xbc;
    }
}