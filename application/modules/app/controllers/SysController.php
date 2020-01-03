<?php
class SysController extends PublicController
{
    /**
     * 获取系统会员卡
     */
    public function xmlAction() {
        $rows = XlbMemberCardModel::getInstance()->getListBySatus();
        $this->xlb_ret(1, '', $rows);
    }

    /**
     * 系统活动列表
     */
    public function xalAction() {
        $page       = $this->getParam('page', 1);
        $pagenum    = $this->getParam('pagenum', 20);
        $rows = XlbActiveModel::getInstance()->getListByStaus($page, $pagenum);
        $this->xlb_ret(1, '', $rows);
    }
}