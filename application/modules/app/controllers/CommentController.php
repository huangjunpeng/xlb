<?php
class CommentController extends XlbController
{
    /**
     * 添加评论
     */
    public function addAction() {
        $b_id = (int)$this->getParam('b_id', 0);
        if ($b_id <= 0){
            $this->xlb_ret(0, '绘本ID不能为空');
        }
        $c_content = $this->getParam('content','');
        if(empty($c_content)){
            $this->xlb_ret(0, '评论内容不能为空');
        }
        $data['u_id']   = $this->uid;
        $data['c_comment_time'] = time();
        $data['b_id']   = $b_id;
        $data['c_content']  = $c_content;
        $id = XlbCommentModel::getInstance()->insert($data);
        if ($id <= 0){
            $this->xlb_ret(0, '评论失败');
        }
        $this->xlb_ret(1, '评论成功', array('id'=>$id));
    }

    /**
     * 删除评论
     */
    public function delAction() {
        $id = (int)$this->getParam('id', 0);
        if ($id <= 0){
            $this->xlb_ret(0, '评论ID不能为空');
        }
        $ret = XlbCommentModel::getInstance()->delete(array('c_id'=>$id));
        if ($ret <= 0){
            $this->xlb_ret(0, '删除失败');
        }
        $this->xlb_ret(1, '删除成功');
    }

    /**
     * 获取绘本所有评论
     */
    public function getAction() {
        $b_id = (int)$this->getParam('b_id', 0);
        if ($b_id <= 0){
            $this->xlb_ret(0, '绘本ID不能为空');
        }
        $page       = $this->getParam('page', 1);
        $pagenum    = $this->getParam('pagenum', 20);
        $rows = XlbCommentModel::getInstance()
            ->getCommentByBookId($b_id, $page, $pagenum);
        foreach ($rows['rows'] as &$row) {
            $row['c_comment_time'] = date('Y年m月d日', (int)$row['c_comment_time']);
        }
        $this->xlb_ret(1, '', $rows);
    }
}