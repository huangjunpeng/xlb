<?php

class Admin_MemberController extends XlbController
{
    /**
     * 获取会员列表
     */
    public function indexAction(){
        $this->view->tables = XlbMemberCardModel::getInstance()->getAll();
    }

    /**
     * 添加编辑会员
     */
    public function saveAction() {
        $member = array();
        //获取ID
        $mc_id = $this->getParam('_id', 0);

        //获取会员卡名称
        $mc_name = $this->getParam('_name');
        if (empty($mc_name) || $mc_name == 'undefined') {
            $this->xlb_ret(0, '会员卡名称不能为空');
        }
        $member['mc_name'] = $mc_name;

        //现价
        $mc_actual_price = $this->getParam('_actual_price');
        if (empty($mc_actual_price) || $mc_actual_price == 'undefined') {
            $this->xlb_ret(0, '现价不能为空');
        }
        $member['mc_actual_price'] = $mc_actual_price;

        //原价
        $mc_price = $this->getParam('_price');
        if (empty($mc_price) || $mc_price == 'undefined') {
            $this->xlb_ret(0, '原价不能为空');
        }
        $member['mc_price'] = $mc_price;

        //有效天数
        $mc_effective_time = $this->getParam('_effective_time');
        if (empty($mc_effective_time) || $mc_effective_time == 'undefined') {
            $this->xlb_ret(0, '有效天数不能为空');
        }
        $member['mc_effective_time'] = $mc_effective_time;

        //是否显示
        $mc_display = (int)$this->getParam('_display');
        $member['mc_display'] = $mc_display;


        if (!empty($mc_id)) {
            $ret = XlbMemberCardModel::getInstance()
                ->editData($mc_id, $member);
            if ($ret >= 0) {
                $this->xlb_ret(1, '编辑成功');
            } else {
                $this->xlb_ret(0, '编辑失败');
            }
        } else {
            $ret = XlbMemberCardModel::getInstance()
                ->insert($member);
            if ($ret > 0) {
                $this->xlb_ret(1, '添加成功');
            } else {
                $this->xlb_ret(0, '添加失败');
            }
        }
    }

    /**
     * 修改状态
     */
    public function setStatusAction() {
        $status = $this->getParam('_status',0);
        $status = $status == 0 ? 1 : 0;
        $id = $this->getParam('id');
        if (empty($id)) {
            $this->xlb_ret(0, 'ID不能为空');
        }
        $xsp = XlbMemberCardModel::getInstance();
        if ($xsp->editData($id, array('mc_status'=>$status)) > 0) {
            $this->xlb_ret(1, '更新成功');
        }
        $this->xlb_ret(0, '更新失败');
    }

    /**
     * 获取柜子信息
     */
    public function getAction() {
        $id = $this->getParam('id');
        if (empty($id)) {
            $this->xlb_ret(0, 'ID不能为空');
        }
        $row = XlbMemberCardModel::getInstance()
            ->getById($id);
        if ($row) {
            $this->xlb_ret(1, '', $row);
        }
        $this->xlb_ret(0, '获取会员信息失败');
    }
}