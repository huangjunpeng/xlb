<?php
class WishController extends XlbController
{
    /**
     * 添加
     */
    public function addAction(){
        $b_id = (int)$this->getParam('b_id', 0);
        if ($b_id <= 0){
            $this->xlb_ret(0, '绘本ID不能为空');
        }
        $row = XlbBookModel::getInstance()->find($b_id);
        if (empty($row)) {
            $this->xlb_ret(0, '绘本不存在');
        }
        $Xwl = XlbWishListModel::getInstance();
        $Xwl->beginTransaction();
        //插入心愿单
        $data['b_id']           = $b_id;
        $row = $Xwl->getRowByWhere($data);
        if (empty($row)) {
            $data['wl_creattime']   = time();
            $wl_id = $Xwl->insert($data);
        } else {
            $xwl = $row->toArray();
            $wl_id = $xwl['wl_id'];
        }
        if ($wl_id <= 0){
            $this->xlb_ret(0, '添加心愿单失败');
        }
        unset($data);
        //插入我的心愿单
        $data['wl_id'] = $wl_id;
        $data['u_id']  = $this->uid;
        $Xmwl = XlbMeWishListModel::getInstance();
        $row = $Xmwl->getRowByWhere($data);
        if (empty($row)) {
            $ret = (int)$Xmwl->insert($data);
            if ($ret <= 0){
                $Xwl->rollBack();
                $this->xlb_ret(0, '添加心愿单失败');
            }
            unset($data);
            $wl_now_num = (int)$xwl['wl_now_num'] + 1;
            if ($wl_now_num == (int)$xwl['wl_target_num']) {
                $data['wl_status']  = 1;
                $data['wl_endtime'] = time();
            }
            $data['wl_now_num'] = $wl_now_num;
            $ret = $Xwl->editData($wl_id, $data);
            if ($ret <= 0){
                $Xwl->rollBack();
                $this->xlb_ret(0, '添加心愿单失败');
            }
        }
        $Xwl->commit();
        $this->xlb_ret(1,'添加心愿单成功');
    }

    /**
     * 删除心愿单
     */
    public function delAction(){
        $b_id = (int)$this->getParam('b_id', 0);
        if ($b_id <= 0){
            $this->xlb_ret(0, '绘本ID不能为空');
        }
        $data['u_id']  = $this->uid;
        $data['b_id']  = $b_id;
        $Xmwl = XlbMeWishListModel::getInstance();
        $row = $Xmwl->getRowByWhere($data);
        if (empty($row)) {
            $this->xlb_ret(1, '删除心愿单成功');
        }
        $Xmwl->beginTransaction();
        $ret = $Xmwl->delete($data);
        if ($ret <= 0){
            $this->xlb_ret(0, '删除心愿单失败');
        }
        $Xwl = XlbWishListModel::getInstance();
        unset($data);
        $data['b_id']           = $b_id;
        $row = $Xwl->getRowByWhere($data);
        if (empty($row)) {
            $Xmwl->rollBack();
            $this->xlb_ret(0, '获取心愿单失败');
        }
        $xwl = $row->toArray();
        $wl_id = $xwl['wl_id'];
        unset($data);
        $wl_now_num = (int)$xwl['wl_now_num'];
        if ($wl_now_num == (int)$xwl['wl_target_num']) {
            $data['wl_status']  = 0;
            $data['wl_endtime'] = 0;
        }
        $wl_now_num = ($wl_now_num - 1) < 0 ? 0 : ($wl_now_num - 1);
        $data['wl_now_num'] = $wl_now_num;
        $ret = $Xwl->editData($wl_id, $data);
        if ($ret <= 0){
            $Xmwl->rollBack();
            $this->xlb_ret(0, '删除心愿单成功');
        }
        $Xmwl->commit();
        $this->xlb_ret(1, '删除心愿单成功');
    }
}