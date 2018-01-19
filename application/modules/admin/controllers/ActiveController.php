<?php
class Admin_ActiveController extends XlbController
{
    /**
     * 获取活动列表
     */
    public function indexAction(){
        $this->view->tables = XlbActiveModel::getInstance()->getAll();
    }
}