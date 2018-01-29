<?php
class Admin_ActiveController extends XlbController
{
    /**
     * 获取活动列表
     */
    public function indexAction(){
        $this->view->tables = XlbActiveModel::getInstance()->getAll();
    }

    /**
     * 添加编辑活动
     */
    public function saveAction() {
        $active = array();
        //获取ID
        $a_id = $this->getParam('_id', 0);

        //获取活动名称
        $a_name = $this->getParam('_name');
        if (empty($a_name) || $a_name == 'undefined') {
            $this->xlb_ret(0, '活动名称不能为空');
        }
        $active['a_name'] = $a_name;

        //位置
        $a_position = $this->getParam('_position');
        if (empty($a_position) || $a_position == 'undefined') {
            $this->xlb_ret(0, '位置不能为空');
        }
        $active['a_position'] = $a_position;

        //开始时间
        $a_begintime = $this->getParam('_begintime');
        if (empty($a_begintime) || $a_begintime == 'undefined') {
            $this->xlb_ret(0, '开始时间不能为空');
        }
        $active['a_begintime'] = $a_begintime . ' 00:00:00';

        //结束时间
        $a_endtime = $this->getParam('_endtime');
        if (empty($a_endtime) || $a_endtime == 'undefined') {
            $this->xlb_ret(0, '结束时间不能为空');
        }
        $active['a_endtime'] = $a_endtime . ' 00:00:00';

        //链接
        $a_link = $this->getParam('_link');
        if (empty($a_link) || $a_link == 'undefined') {
            $this->xlb_ret(0, '链接不能为空');
        }
        $active['a_link'] = $a_link;

        //图片
        $a_picture = $this->getParam('_picture');
        if (empty($a_picture) || $a_picture == 'undefined') {
            $this->xlb_ret(0, '图片路径不能为空');
        }
        $active['a_picture'] = $a_picture;

        if (!empty($a_id)) {
            $ret = XlbActiveModel::getInstance()
                ->editData($a_id, $active);
            if ($ret >= 0) {
                $this->xlb_ret(1, '编辑成功');
            } else {
                $this->xlb_ret(0, '编辑失败');
            }
        } else {
            $ret = XlbActiveModel::getInstance()
                ->insert($active);
            if ($ret > 0) {
                $this->xlb_ret(1, '添加成功');
            } else {
                $this->xlb_ret(0, '添加失败');
            }
        }
    }

    /**
     * 删除
     */
    public function delAction() {
        $id = $this->getParam('id');
        if (empty($id)) {
            $this->xlb_ret(0, 'ID不能为空');
        }
        XlbActiveModel::getInstance()
            ->delById($id);
        $this->xlb_ret(1, '删除成功');
    }

    /**
     * 修改状态
     */
    public function setStatusAction()
    {
        $status = $this->getParam('_status',0);
        $status = $status == 0 ? 1 : 0;
        $id = $this->getParam('id');
        if (empty($id)) {
            $this->xlb_ret(0, 'ID不能为空');
        }
        $xsp = XlbActiveModel::getInstance();
        if ($xsp->editData($id, array('a_status'=>$status)) > 0) {
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
        $row = XlbActiveModel::getInstance()
            ->getById($id);
        if ($row) {
            $this->xlb_ret(1, '', $row);
        }
        $this->xlb_ret(0, '获取活动信息失败');
    }
}