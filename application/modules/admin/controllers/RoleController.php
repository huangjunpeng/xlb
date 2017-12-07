<?php
class Admin_RoleController extends XlbController
{
    /**
     * 柜子首页
     */
    public function indexAction()
    {
        $this->view->tables = XlbSpModel::getInstance()->getAll();
    }

    public function roleManageAction()
    {
    }

    public function cabiUserAction()
    {
    }

    /**
     * 添加更新管理员
     */
    public function addAction()
    {
        $map = $this->getAllParams();
        $sp = array();
        $sp['sp_name'] = $map['_name'];
        if (empty($sp['sp_name']) || $sp['sp_name'] == 'undefined') {
            $this->xlb_ret(0, '用户名不能为空');
        }
        $sp['sp_english_name'] = $map['_english_name'];
        if (empty($sp['sp_english_name']) || $sp['sp_name'] == 'undefined') {
            $this->xlb_ret(0, '英文名不能为空');
        }
        $sp['sp_email'] = $map['_email'];
        if (empty($sp['sp_email']) || $sp['sp_email'] == 'undefined') {
            $this->xlb_ret(0, '邮箱不能为空');
        }
        $sp['sp_mobile'] = $map['_mobile'];
        if (empty($sp['sp_mobile']) || $sp['sp_mobile'] == 'undefined') {
            $this->xlb_ret(0, '手机号不能为空');
        }
        $sp['sp_dept'] = $map['_dept'];
        if ($sp['sp_dept'] == 'undefined') {
            $sp['sp_dept'] = '';
        }
        $sp['sp_position'] = $map['_position'];
        if ($sp['sp_position'] == 'undefined') {
            $sp['sp_position'] = '';
        }
        $sp['role_id'] = $map['role_id'];
        if ($sp['role_id'] == 'undefined') {
            $sp['role_id'] = 1;
        }
        $_id = 0;
        if (!empty($map['_id'])) {
            $_id = $map['_id'];
        }
        $xsp = XlbSpModel::getInstance();
        if (empty($_id)) {
            $sp['sp_password'] = $map['_password'];
            if (empty($sp['sp_password']) || $sp['sp_password'] == 'undefined'){
                $this->xlb_ret(0, '密码不能为空');
            }
            $sp['sp_password'] = md5($sp['sp_password']);

            //添加
            if ($xsp->getSpByWhere(array('sp_mobile'=>$sp['sp_mobile']))){
                $this->xlb_ret(0, '手机号已存在');
            }
            $id = $xsp->insert($sp);
            if ($id <= 0) {
                $this->xlb_ret(0, '添加失败');
            }
            $this->xlb_ret(1, '添加成功',array('id'=>$id));
        } else {
            $xsp->editData($_id, $sp);
            $this->xlb_ret(1, '更新成功',array('id'=>$_id));
        }
    }

    /**
     * 修改管理员状态
     */
    public function setStatusAction()
    {
        $status = $this->getParam('_status',0);
        $status = $status == 0 ? 1 : 0;
        $id = $this->getParam('id');
        if (empty($id)) {
            $this->xlb_ret(0, 'ID不能为空');
        }
        $xsp = XlbSpModel::getInstance();
        if ($xsp->editData($id, array('sp_status'=>$status)) > 0) {
            $this->xlb_ret(1, '更新成功');
        }
        $this->xlb_ret(0, '更新失败');
    }

    /**
     * 编辑管理员获取管理员信息
     */
    public function editAction()
    {
        $xsp = XlbSpModel::getInstance();
        $id = $this->getParam('id');
        if (empty($id)) {
            $this->xlb_ret(0, 'ID不能为空');
        }
        $obj = $xsp->getOne($id);
        $this->xlb_ret(1, '', $obj);
    }

    /**
     * 修改密码
     */
    public function modifyPassAction()
    {
        $id = $this->getParam('id');
        if (empty($id)) {
            $this->xlb_ret(0, 'ID不能为空');
        }
        $old = $this->getParam('_old');
        if (empty($old)) {
            $this->xlb_ret(0, '旧密码不能为空');
        }
        $new = $this->getParam('_new');
        if (empty($new)) {
            $this->xlb_ret(0, '新密码不能为空');
        }
        $new = md5($new);
        if ($old == $new) {
            $this->xlb_ret(1, '修改成功');
        }
        $xsp = XlbSpModel::getInstance();
        $obj = $xsp->getOne($id);
        if (md5($old) != $obj['_password']) {
            $this->xlb_ret(0, '旧密码与原来密码不一致');
        }
        if ($xsp->editData($id, array('sp_password'=>$new)) > 0) {
            $this->xlb_ret(1, '修改成功');
        }
        $this->xlb_ret(0, '修改失败');
    }
}