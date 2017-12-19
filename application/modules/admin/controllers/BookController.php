<?php
class Admin_BookController extends XlbController
{
    /**
     * 获取绘本大全
     */
    public function indexAction()
    {
        $page = $this->getParam('page', 1);
        $pagenum = $this->getParam('pagenum', 10);
        $search = $this->getParam('search', '');
        $rows = XlbBookModel::getInstance()
            ->getBook($page, $pagenum, $search);
        foreach ($rows['rows'] as $row) {
            $b_ids[] = $row['id'];
        }
        $types = XlbBookCategoryMapModel::getInstance()
            ->getCategoryByBId($b_ids);
        foreach ($rows['rows'] as &$row) {
            if (isset($types[$row['id']])) {
                $bc_names = array_column($types[$row['id']], 'bc_name');
                $row['theme'] = implode(' ',$bc_names);
            } else {
                $row['theme'] = '';
            }
        }
        $this->view->rows = $rows;
        $this->view->search = $search;
        $page = new Page($rows['totalRows'], 10, $this->getRequest()->getParams());
        $url = '/xlb/admin/book/index';
        if (!empty($search)) {
            $url .= '/search/'.$search;
        }
        $this->view->page = $page->show($url);
    }

    public function themeAction(){

    }

    public function shareAction(){

    }
}