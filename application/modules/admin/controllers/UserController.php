<?php
class Admin_UserController extends XlbController
{
    public function indexAction()
    {
        $page       = $this->getParam('page', 1);
        $pagenum    = $this->getParam('pagenum', 20);
        $search     = $this->getParam('search', '');
        $rows = XlbCabinetModel::getInstance()
            ->getAllCabinet($page, $pagenum, $search);
        $this->view->rows = $rows;
        $this->view->search = $search;
    }
}