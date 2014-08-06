<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'admbase.php';

/*会员收益记录*/
class EarningsRecord extends Admbase {

	/**
   
	*/
	public function index(){
    $this->_setView(array('_a'=>$this->_a,'_m'=>$this->_m));
    $viewHtml = sprintf('%s_%s.html', $this->_a, $this->_m);
		$this->smarty->render($viewHtml, $this->viewData);
	}
  /*
   收益列表
  */
  public function lists($user = 0,$articleid = 0,$cateid = 0,$channelid = 0,$postdate = 0){
    
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
