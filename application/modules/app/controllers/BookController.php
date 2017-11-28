<?php
class BookController extends XlbController
{
    /**
     * 图书列表
     */
    public function bookListAction()
    {
        //获取经度
        $long       = (double)$this->_getParam('long');
        if (empty($long)) {
            $this->xlb_ret(0, '位置不能为空');
        }

        //获取纬度
        $lat        = (double)$this->_getParam('lat');
        if (empty($lat)) {
            $this->xlb_ret(0, '位置不能为空');
        }

        $bvm        = XlbBookViewModel::getInstance();
        $_bvm       = $bvm->listData(0, 0, 0, $long, $lat);
        $allBook    = $bvm->getAllBook(
            XlbBookCategoryModel::getInstance()->getAllCategorys(),
            XlbBookCategoryMapModel::getInstance()->getAllMap(),
            $_bvm
        );
        $this->xlb_ret(1, '', $allBook);
    }
}