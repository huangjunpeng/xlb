<?php
class BookController extends PublicController
{
    /**
     * 图书列表
     */
    public function bookListAction() {
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

        //记录搜索关键字
        $uid = $this->getUid();
        $search['sn_name'] = $_name;
        $search['u_id'] = $uid;
        XlbSearchNameModel::getInstance()
            ->insert($search);

        $page = $this->getParam('page', 0);
        $rows = XlbBookModel::getInstance()
            ->searchByName($_name, $page);
        if ($rows['pages'] == 0 || count($rows['rows']) == 0) {
            $this->xlb_ret(1,'',array());
        }
        $b_ids = array();
        foreach ($rows['rows'] as $row) {
            $b_ids[] = $row['id'];
        }
        $types = XlbBookCategoryMapModel::getInstance()
            ->getCategoryByBId($b_ids);
        foreach ($rows['rows'] as &$row) {
            if (isset($types[$row['id']])) {
                $row['theme'] = $types[$row['id']];
            } else {
                $row['theme'] = array();
            }
        }
        $this->xlb_ret(1, '', $rows);
    }

    /**
     * 获取首页数据
     */
    public function xbiAction() {
        $page       = $this->getParam('page', 1);
        $pagenum    = $this->getParam('pagenum', 20);
        $status     = $this->getParam('status', 1);
        $long       = empty((double)$this->_getParam('long')) ? 0 : (double)$this->_getParam('long');
        $lat        = empty((double)$this->_getParam('lat')) ? 0 : (double)$this->_getParam('lat');
        if (empty($status)) {
            $this->xlb_ret(0, '状态不能为空');
        }
        $rows = XlbShareBookModel::getInstance()
            ->getBookByStatus($status, $page, $pagenum, $long, $lat);
        $this->xlb_ret(1, '', $rows);
    }

    /**
     * 获取绘本详情
     */
    public function getinfoAction(){
        //获取绘本ID
        $b_id = (int)$this->getParam('id', 0);
        if (empty($b_id)) {
            $this->xlb_ret(0, '绘本ID不能为空');
        }
        //获取格子ID
        $cs_id = (int)$this->getParam('space_id', 0);
        //获取绘本详情
        $row = XlbBookModel::getInstance()
            ->getInfoById($b_id, $cs_id);
        if (empty($row)) {
            $this->xlb_ret(0, '绘本未找到');
        }

        //柜子列表
        $cabis = XlbShareBookModel::getInstance()->getList($b_id, $cs_id);
        if (empty($cabis)) {
            $row['cabis'] = null;
        } else {
            $row['cabis'] = $cabis;
        }


        //获取用户ID
        $uid = $this->getUid();
        if ($uid == 0) {
            $row['iswish'] = false;
        } else {
            $wish = XlbWishListModel::getInstance()
                ->getRowByUidAndBId($uid, $b_id);
            $row['iswish'] = empty($wish) ? false : true;
        }

        //获取可能喜欢
        $themes = array();
        if (!empty($row['theme'])) {
            $themes = array_column($row['theme'], 'bc_id');
        }
        $row['like'] = XlbBookModel::getInstance()
            ->getLikeBook($themes);

        $this->xlb_ret(1, '', $row);
    }

    /**
     * 获取柜子列表
     */
    public function xclAction(){
        //获取经度
        $_long = (double)$this->_getParam('long');
        if (empty($_long)) {
            $this->xlb_ret(0, '经度不能为空');
        }

        //获取纬度
        $_lat  = (double)$this->_getParam('lat');
        if (empty($_lat)) {
            $this->xlb_ret(0, '纬度不能为空');
        }

        //获取绘本ID
        $b_id = (int)$this->getParam('id', 0);
        if (empty($b_id)) {
            $this->xlb_ret(0, '绘本ID不能为空');
        }
        $rows = XlbShareBookModel::getInstance()->getCabiList($b_id, $_long, $_lat);
        $this->xlb_ret(1, '', $rows);
    }

    /**
     * 获取空格子列表
     */
    public function gecAction() {
        $_id = $this->getParam('id');
        if (empty($_id)) {
            $this->xlb_ret(0, '柜子ID不能为空');
        }
        $ret['casps'] = XlbCabispaceModel::getInstance()
            ->getCabispaceByCabiId($_id, 0);
        $this->xlb_ret(1,'',$ret);
    }

    /**
     * 获取附件柜子列表
     */
    public function gclAction() {
        //获取经度
        $_long = (double)$this->_getParam('long');
        if (empty($_long)) {
            $this->xlb_ret(0, '经度不能为空');
        }

        //获取纬度
        $_lat  = (double)$this->_getParam('lat');
        if (empty($_lat)) {
            $this->xlb_ret(0, '纬度不能为空');
        }
        $rows = XlbCabinetModel::getInstance()
            ->getCabiList($_long, $_lat);
        $this->xlb_ret(1, '', $rows);
    }

    /**
     * 获取热搜列表
     */
    public function ghsAction() {
        $hots = XlbSearchNameModel::getInstance()
            ->getHotSearch();
        $this->xlb_ret(1, '', $hots);
    }
}