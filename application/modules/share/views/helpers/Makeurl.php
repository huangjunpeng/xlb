<?php
class My_View_Helper_Makeurl {
	public $view;
	public function setView(Zend_View_Interface $views) {
		$this->view = $views;
	}
	
	/**
	 * 构造URL函数
	 *
	 * @param string $controller
	 * @param string $action
	 * @param array $param
	 */
	public function makeurl($controller='index',$action='index',$param=''){
		$url = array('controller'=>$controller,
					 'action'=>$action,
		);
		if (empty($param)) {
			return $this->view->url($url,null,true);
		}
		else 
		{
			foreach ($param as $k=>$v){
				$url[$k] = $v;
			}
		}
		return $this->view->url($url,null,true);
	}
}
?>
