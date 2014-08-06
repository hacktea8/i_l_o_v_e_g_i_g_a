<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'admbase.php';

/* 用户管理 */
class User extends Admbase {

	/**
   
	*/
	public function index(){
    $this->_setView(array('_a'=>$this->_a,'_m'=>$this->_m));
    $viewHtml = sprintf('%s_%s.html', $this->_a, $this->_m);
		$this->smarty->render($viewHtml, $this->viewData);
	}
  /*
   用户新增、修改
  */
  public function view($userid = 0){
    $postData = $this->input->post('data','');
    if($postData){
      //更新
    }
    $data = array();
    $this->_setView(array('_a'=>$this->_a,'_m'=>$this->_m));
    $viewHtml = sprintf('%s_%s.html', $this->_a, $this->_m);
    $this->smarty->render($viewHtml, $this->viewData);
  }
}
