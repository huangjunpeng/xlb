<?php
class Admin_CabinetController extends XlbController
{
    public function indexAction() {
        $page       = $this->getParam('page', 1);
        $pagenum    = $this->getParam('pagenum', 20);
        $search     = $this->getParam('search', '');
        $rows = XlbCabinetModel::getInstance()
            ->getAllCabinet($page, $pagenum, $search);
        $this->view->rows = $rows;
        $this->view->search = $search;
    }

    /**
     * 添加柜子
     */
    public function cabiAddAction()
    {
        $cabi = array(
            'cabi_creattime' => time(),
            'cabi_optime' => time()
        );
        //柜子编号
        $_no = $this->getParam('_no');
        if(empty($_no)) {
            $this->xlb_ret(0, '柜子编号不能为空');
        }
        $cabi['cabi_no'] = $_no;

        //柜子格子数
        $_space_num = (int)$this->getParam('_space_num');
        if ($_space_num <= 0) {
            $this->xlb_ret(0, '格子不能为空');
        }
        $cabi['cabi_space_num'] = $_space_num;

        //书柜名
        $_name = $this->getParam('_name');
        if (empty($_name)) {
            $this->xlb_ret(0, '柜子名不能为空');
        }
        $cabi['cabi_name'] = $_name;

        //书柜描述
        $_desc = $this->getParam('_desc');
        if (!empty($_desc)) {
            $cabi['cabi_desc'] = $_desc;
        }

        //经度
        $_long = $this->getParam('_long');
        if (empty($_long)) {
            $this->xlb_ret(0, '经度不能为空');
        }
        $cabi['cabi_long'] = $_long;

        //纬度
        $_lat = $this->getParam('_lat');
        if (empty($_lat)) {
            $this->xlb_ret(0, '纬度不能为空');
        }
        $cabi['cabi_lat'] = $_lat;

        //
        $geohash = new Geohash();
        $cabi['cabi_geohash'] = $geohash->encode($_long, $_lat);

        //sp
        $_sp = $this->getParam('sp_id');
        if (empty($_lat)) {
            $this->xlb_ret(0, '服务商ID不能为空');
        }
        $cabi['sp_id'] = $_sp;

        //添加
        $xcm = XlbCabinetModel::getInstance();
        $id = $xcm->insert($cabi);
        if ($id <= 0) {
            $this->xlb_ret(0, '添加失败');
        }
        XlbCabispaceModel::getInstance()
            ->addCabispace($id, $_no, $_space_num);
        $this->xlb_ret(1,'添加成功', array('id'=>$id));
    }
}