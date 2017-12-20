<?php
class Admin_BookController extends XlbController
{
    /**
     * 获取绘本大全
     */
    public function indexAction()
    {
        $page = $this->getParam('page', 1);
        $pagenum = $this->getParam('pagenum', 10);
        $search = $this->getParam('search', '');
        $rows = XlbBookModel::getInstance()
            ->getBook($page, $pagenum, $search);
        foreach ($rows['rows'] as $row) {
            $b_ids[] = $row['id'];
        }
        $types = XlbBookCategoryMapModel::getInstance()
            ->getCategoryByBId($b_ids);
        foreach ($rows['rows'] as &$row) {
            if (isset($types[$row['id']])) {
                $bc_names = array_column($types[$row['id']], 'bc_name');
                $row['theme'] = implode(' ',$bc_names);
            } else {
                $row['theme'] = '';
            }
        }
        $this->view->rows = $rows;
        $this->view->search = $search;
        $page = new Page($rows['totalRows'], $pagenum, $this->getRequest()->getParams());
        $url = '/xlb/admin/book/index/pagenum/'.$pagenum;
        if (!empty($search)) {
            $url .= '/search/'.$search;
        }
        $this->view->page = $page->show($url);
    }

    /**
     * 绘本主题
     */
    public function themeAction(){

    }

    /**
     * 共享绘本列表
     */
    public function shareAction(){
        $page = $this->getParam('page', 1);
        $pagenum = $this->getParam('pagenum', 10);
        $search = $this->getParam('search', '');
        $rows = XlbShareBookModel::getInstance()
            ->getShareBook($page, $pagenum, $search);
        $this->view->rows = $rows;
        $this->view->search = $search;
        $page = new Page($rows['totalRows'], 10, $this->getRequest()->getParams());
        $url = '/xlb/admin/book/share';
        if (!empty($search)) {
            $url .= '/search/'.$search;
        }
        $this->view->page = $page->show($url);
    }

    /**
     * 回去绘本详情
     */
    public function getinfoAction(){
        $b_id = (int)$this->getParam('id', 0);
        if (empty($b_id)) {
            $this->xlb_ret(0, '绘本ID不能为空');
        }
        $row = XlbBookModel::getInstance()->getInfoById($b_id);
        if (!empty($row['theme'])) {
            $bc_names = array_column($row['theme'], 'bc_name');
            $row['theme'] = implode(' ',$bc_names);
        } else {
            $row['theme'] = '';
        }
        $this->xlb_ret(1,'' ,$row);
    }

    /**
     * 添加共享绘本
     */
    public function addshareAction(){
        $share = array();
        $b_id = (int)$this->getParam('_id', 0);
        if (empty($b_id)) {
            $this->xlb_ret(0, '绘本ID不能为空');
        }
        $share['b_id'] = $b_id;
        $sb_number = $this->getParam('_number');
        if (empty($sb_number)) {
            $this->xlb_ret(0, '共享编号不能为空');
        }
        $share['sb_number'] = $sb_number;
        $sp_share_price = (float)$this->getParam('_share_price', 2);
        $share['sb_share_price'] = $sp_share_price;
        $share['sb_creattime'] = time();
        $cabi_id = (int)$this->getParam('cabi_id');
        if (empty($cabi_id)) {
            $this->xlb_ret(0, '柜子ID不能为空');
        }
        $cs_id = (int)$this->getParam('cs_id');
        if (empty($cs_id)){
            $this->xlb_ret(0, '格子ID不能为空');
        }
        $xsb = XlbShareBookModel::getInstance();
        $xsb->beginTransaction();
        $sb_id = $xsb->insert($share);
        if ($sb_id <= 0) {
            $this->xlb_ret(0, '添加共享绘本失败');
        }
        $ret = XlbCabispaceModel::getInstance()
            ->editData($cs_id, array('sb_id'=>$sb_id,'cs_status'=>1));
        if ($ret < 0) {
            $xsb->rollBack();
            $this->xlb_ret(0, '添加共享绘本失败');
        }
        $xsb->commit();
        $this->xlb_ret(1, '共享成功');
    }
}