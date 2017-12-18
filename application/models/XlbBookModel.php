<?php
class XlbBookModel extends Xlb
{
    /**
     * 表名
     * @var string
     */
    protected  $_name       = "book";

    /**
     * 主键
     * @var string
     */
    protected  $_primary    = 'b_id';

    /**
     * @var XlbBookModel
     */
    public static $_instance = null;

    /**
     * @return XlbBookModel
     */
    public static function getInstance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new static();
        }
        return self::$_instance;
    }

    /**
     * @param $_name
     * @param $page
     * @param int $pagesize
     * @return array
     */
    public function searchByName($_name, $page = null, $pagesize = 20){
        $select = $this->getAdapter()->select();
        $select->from(array('t'=>$this->_name), 'count(*)')
            ->where("t.b_name LIKE '%{$_name}%'");
        $pages = (int)$this->getAdapter()->fetchOne($select);
        if ($pages == 0) {
            $ret['pages'] = $pages;
            $ret['rows']  = array();
            return $ret;
        }
        $pages = ceil($pages / $pagesize);
        unset($select);
        $fields = array(
            'id'=>'b_id',
            'name'=>'b_name',
            'picture'=>'b_picture',
            'age_reading'=>'b_age_reading',
            'author'=>'b_author');
        $select = $this->getAdapter()->select();
        $select->from(array('t'=>$this->_name), $fields)
            ->where("t.b_name LIKE '%{$_name}%'")
            ->order('b_score DESC');
        if ($page !== null) {
            $select->limitPage($page, $pagesize);
        }
        $rows = $this->getAdapter()->fetchAll($select);
        $ret['pages'] = $pages;
        $ret['rows']  = $rows;
        return $ret;
    }

    /**
     * @param int $page
     * @param int $pagesize
     * @param string $search
     * @return mixed
     */
    public function getBook($page = 1, $pagesize = 20, $search = '') {
        $select = $this->getAdapter()->select();
        $select->from(array('t'=>$this->_name), 'count(*)');
        if (!empty($search)) {
            $select->where("b_name LIKE '%{$search}%'");
        }
        $totalRows = (int)$this->getAdapter()->fetchOne($select);
        if ($totalRows == 0) {
            $ret['pages'] = 0;
            $ret['rows']  = array();
            return $ret;
        }
        $pages = ceil($totalRows / $pagesize);
        unset($select);
        $fields = array(
            'id'=>'b_id',
            'name'=>'b_name',
            'picture'=>'b_picture',
            'age_reading'=>'b_age_reading',
            'author'=>'b_author',
            'press'=>'b_press',
            'press_data'=>'b_press_data',
            'languages'=>'b_languages',
            'describe'=>'b_describe',
            'score'=>'b_score'
        );
        $select = $this->getAdapter()->select();
        $select->from(array('t'=>$this->_name), $fields);
        if (!empty($search)) {
            $select->where("b_name LIKE '%{$search}%'");
        }
        $select->order('b_score DESC');
        if ($page !== null) {
            $select->limitPage($page, $pagesize);
        }
        $rows = $this->getAdapter()->fetchAll($select);
        $ret['pages'] = $pages;
        $ret['rows']  = $rows;
        $ret['totalRows'] = $totalRows;
        return $ret;
    }

    /**
     * 获取书详情
     * @param $b_id
     * @return mixed|null
     */
    public function getInfoById($b_id) {
        $select = $this->getAdapter()->select();
        $select->from($this->_name, array(
                'id'=>'b_id',
                'name'=>'b_name',
                'age_reading'=>'b_age_reading',
                'author'=>'b_author',
                'press'=>'b_press',
                'press_data'=>'b_press_data',
                'languages'=>'b_languages',
                'describe'=>'b_describe',
                'picture'=>'b_picture',
                'score'=>'b_score'))
            ->where('b_id=?',$b_id);
        $row = $this->getAdapter()->fetchRow($select);
        if (empty($row)){
            return null;
        }
        $types = XlbBookCategoryMapModel::getInstance()
            ->getCategoryByBId(array($row['id']));
        $row['theme'] = $types[$row['id']];
        $comment = XlbCommentModel::getInstance()
            ->getCommentByBookId($b_id, 1, 1);
        if (count($comment['rows']) > 0) {
            $row['comment'] = $comment['rows'][0];
        } else {
            $row['comment'] = null;
        }
        return $row;
    }
}
