<?php
class UserController extends XlbController
{
    /**
     * 获取孩子接口列表
     */
    public function childrenListAction()
    {
        if ($this->getRequest()->isPost()) {
            $list = XlbUserChildrenModel::getInstance()->getChildrenListByUid($this->uid);
            foreach ($list as &$value) {
                $time = strtotime($value['brithday']);
                $time = time() - $time;
                $year = floor($time / 60 / 60 / 24 / 365);
                $time -= $year * 60 * 60 * 24 * 365;
                $month = floor($time / 60 / 60 / 24 / 30);
                $value['age'] = $year.'岁'.$month.'个月';
            }
            $this->xlb_ret(1,'',$list);
        }else {

        }
    }

    /**
     * 添加编辑孩子接口
     */
    public function childrenAddAction()
    {
        if ($this->getRequest()->isPost()) {
            $children = array();
            $nickname = $this->_getParam('nickname');
            if (!empty($nickname)) {
                $children['uc_nickname'] = $nickname;
            } else {
                $this->xlb_ret(0,'昵称不能为空');
            }
            $brithday = $this->_getParam('brithday');
            if (!empty($brithday)) {
                $children['uc_brithday'] = $brithday;
            }
            $sex = (int)$this->_getParam('sex');
            if (!empty($sex)) {
                $children['uc_sex'] = $sex;
            }
			$xlbm = XlbUserChildrenModel::getInstance();
            $id = $this->_getParam('id');
			if (empty($id)) {
				$children['u_id'] = $this->uid;
				$id = (int)$xlbm->addData($children);
				if ($id > 0) {
					$this->xlb_ret(1,'添加成功',['id' => $id]);
				} else {
					$this->xlb_ret(0,'添加失败');
				}
			} else {
				$ret = (int)$xlbm->editData($id,$children);
				if ($ret > 0) {
					$this->xlb_ret(1,'更新成功',['id' => $id]);
				} else {
					$this->xlb_ret(0,'更新失败');
				}
			}
        }else {
            $this->xlb_ret(0);
        }
    }

    /**
     * 删除孩子
     */
    public function childrenDelAction()
    {
        $id = $this->_getParam('id');
        if (empty($id)) {
            $this->xlb_ret(0, '孩子ID不能为空');
        }
        $xlbm = XlbUserChildrenModel::getInstance();
        $ret = (int)$xlbm->delData($id);
        if ($ret > 0) {
            $this->xlb_ret(1,'删除成功',['id' => $id]);
        } else {
            $this->xlb_ret(0,'删除失败');
        }
    }

    /**
     * 图书列表
     */
    public function bookListAction()
    {
        //获取当前页
        $page       = (int)$this->_getParam('page', 1);
        //获取每页数量
        $pagenum    = (int)$this->_getParam('pagenum', 20);
        //获取书状态: 1：可借阅、2：借阅中
        $status     = (int)$this->_getParam('status', 1);
        //获取经度
        $long       = empty((double)$this->_getParam('long')) ? 0 : (double)$this->_getParam('long');
        //获取纬度
        $lat        = empty((double)$this->_getParam('lat')) ? 0 : (double)$this->_getParam('lat');
        $bvm = XlbBookViewModel::getInstance();
        $ret = $bvm->listData(
            ($page - 1) * $pagenum,
            $pagenum,
            $status,
            $long,
            $lat
        );
        $this->xlb_ret(1, '', $ret);
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

    /**
     * 修改用户昵称
     */
    public function xumAction() {
        $u_nickname =  $this->getParam('nickname', '');
        if (empty($u_nickname)) {
            $this->xlb_ret(0, '昵称不能为空');
        }
        if ($u_nickname == $this->user['u_nickname']){
            $this->xlb_ret(1, '修改成功');
        }
        $ret = XlbUserInfoModel::getInstance()
            ->editData($this->uid, array('u_nickname'=>$u_nickname));
        if ($ret <=0 ){
            $this->xlb_ret(0, '修改失败');
        }
        $this->xlb_ret(1, '修改成功');
    }

    /**
     * 获取用户信息
     */
    public function getinfoAction() {
        $row = XlbUserInfoModel::getInstance()
            ->getInfoById($this->uid);
        $this->xlb_ret(1, '', $row);
    }
}