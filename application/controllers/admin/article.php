<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'admbase.php';
class Article extends Admbase {

	/**
   文章列表管理
	*/
	public function lists($articleid = 0,$cateid = 0,$channelid = 0,$userid = 0,$postdate = 0,$update = 0,$order = ''){
    $this->_setView(array('_a'=>$this->_a,'_m'=>$this->_m));
    $viewHtml = sprintf('%s_%s.html', $this->_a, $this->_m);
		$this->smarty->render($viewHtml, $this->viewData);
	}
  /*
   
  */
  public function view($articleid = 0){
    $postData = $this->input->post('data',1);
    if($postData){
      //更新
    }
    $data = array();
    $this->_setView(array('_a'=>$this->_a,'_m'=>$this->_m));
    $viewHtml = sprintf('%s_%s.html', $this->_a, $this->_m);
    $this->smarty->render($viewHtml, $this->viewData);
  }
}
