<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'viewbase.php';

/* 文章发表 */
class Post extends Viewbase {

	/**
   新发布、更新文章
	 */
	public function index()
	{
    $this->_setView(array('_a'=>$this->_a,'_m'=>$this->_m));
    $viewHtml = sprintf('%s_%s.html', $this->_a, $this->_m);
		$this->smarty->render($viewHtml, $this->viewData);
	}
  /*
   接受POST
  */
  public function donew(){
    
  }
  
}
