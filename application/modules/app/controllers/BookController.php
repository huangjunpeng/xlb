<?php
class BookController extends XlbController
{
    /**
     * 图书列表
     */
    public function bookListAction()
    {
        //获取经度
        $long       = empty((double)$this->_getParam('long')) ? 0 : (double)$this->_getParam('long');
        //获取纬度
        $lat        = empty((double)$this->_getParam('lat')) ? 0 : (double)$this->_getParam('lat');
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