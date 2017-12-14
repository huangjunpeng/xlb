<?php
class BookController extends PublicController
{
    /**
     * 图书列表
     */
    public function bookListAction()
    {
        //获取经度
        $long       = empty((double)$this->_getParam('long')) ? 0 : (double)$this->_getParam('long');
        //获取纬度
        $lat        = empty((double)$this->_getParam('lat')) ? 0 : (double)$this->_getParam('lat');
        $bvm        = XlbBookViewModel::getInstance();
        $_bvm       = $bvm->listData(0, 0, 0, $long, $lat);
        $allBook    = $bvm->getAllBook(
            XlbBookCategoryModel::getInstance()->getAllCategorys(),
            XlbBookCategoryMapModel::getInstance()->getAllMap(),
            $_bvm
        );
        $this->xlb_ret(1, '', $allBook);
    }

    /**
     * 获取分类列表
     */
    public function getAction(){
        $rows = XlbBookCategoryModel::getInstance()
            ->getCategorys();
        $types = array();
        foreach ($rows as &$row){
            if (!isset($types[$row['bc_id']])){
                $types[$row['bc_id']]['bc_id'] = $row['bc_id'];
                $types[$row['bc_id']]['bc_name'] = $row['bc_name'];
                $types[$row['bc_id']]['books'][] = &$row;
            } else {
                $types[$row['bc_id']]['books'][] = &$row;
            }
            unset($row['bc_id']);
            unset($row['bc_name']);
        }
        $rets = array();
        foreach ($types as $type) {
            $rets[] = $type;
        }
        $this->xlb_ret(1, '', $rets);
    }

    /**
     * 书分类
     */
    public function xbcAction(){
        $xbc = XlbBookCategoryModel::getInstance();
        $types = $xbc->getAllCategorys();
        $this->xlb_ret(1, '', $types);
    }

    /**
     * 书列表
     */
    public function xbAction(){
        $bc_id = $this->getParam('bc_id', 0);
        if ($bc_id <= 0){
            $this->xlb_ret(0, '分类ID不能为空');
        }
        $page = $this->getParam('page', 0);
        $rows = XlbBookCategoryMapModel::getInstance()
            ->getBookByBcId($bc_id, $page);
        $this->xlb_ret(1, '', $rows);
    }

    /**
     * 搜索
     */
    public function xbsAction(){
        $_name = $this->getParam('name');
        if (empty($_name)) {
            $this->xlb_ret(0, '请输入书名');
        }
        $page = $this->getParam('page', 0);
        $rows = XlbBookModel::getInstance()
            ->searchByName($_name, $page);
        $this->xlb_ret(1, '', $rows);
    }
}