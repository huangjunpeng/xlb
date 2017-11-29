<?php
class Admin_IndexController extends XlbController
{
    /**
     * 柜子首页
     */
    public function indexAction()
    {

    }

    public function cabiListAction()
    {
        $xcm = XlbCabinetModel::getInstance();
        $this->view->tables = $xcm->getAllCabinet();
    }

    public function indexListAction(){}

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
        $cabi['sp_id'] = $this->uid;

        //添加
        $xcm = XlbCabinetModel::getInstance();
        $id = $xcm->insert($cabi);
        if ($id <= 0) {
            $this->xlb_ret(0, '添加失败');
        }
        $this->_forward('index') ;
    }


    /**
     * 后台登录接口
     */
    public function loginAction()
    {
        if ($this->getRequest()->isPost()) {
            $username = $this->getParam('username');
            if (empty($username)) {
                $this->view->error = '用户名不能为空';
                goto end_;
            }
            $options['sp_loginname'] = $username;
            $password = $this->getParam('password');
            if (empty($password)) {
                $this->view->error = '密码不能为空';
                goto end_;
            }
            $password = md5($password);
            $options['sp_password'] = $password;
            $xsp = XlbSpModel::getInstance();
            $row = $xsp->getSpByWhere($options);
            if (empty($row)) {
                $this->view->error = '用户名或密码错误';
                goto end_;
            }
            $row = $row->toArray();
            $this->uid = $row['sp_id'];
            //生成token
            $token = Tools::getEncodeUid(XLB_ADMIN.';'.$this->uid);
            setcookie('xlbtoken', $token, time()+3600*24, '/');
            $_COOKIE['xlbtoken'] = $token;
            $this->_forward('index') ;
        }
        end_:
    }

    /**
     * 上传文件
     */
    public function uploadAction()
    {
        if ($this->getRequest()->isPost()) {
            $upload = new Upload();
            /*设置附件上传根目录*/
            $upload->rootPath = XLB_WEB_ROOT;
            /*设置附件上传子目录*/
            $upload->savePath = XLB_UPLOAD;
            /*子目录创建方式屏蔽*/
            $upload->subName = array();
            $info =  $upload->upload();
            if (empty($info)) {
                $this->xlb_ret(0,'上传失败: '.$upload->getError());
            }
            $files = array();
            foreach ($info as $item) {
                $file['type'] = $item['type'];
                $file['name'] = $item['name'];
                $file['size'] = $item['size'];
                $file['path'] = $this->view->baseUrl().$item['savepath'].$item['savename'];
                $files[] = $file;
            }
            $this->xlb_ret(1,'', $files);
        }
    }
}

