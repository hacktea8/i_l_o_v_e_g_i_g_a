<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'viewbase.php';

/* 控制台 */
class Console extends Viewbase {

	/**
	 */
	public function index()
	{
    $this->_setView(array('_a'=>$this->_a,'_m'=>$this->_m));
    $viewHtml = sprintf('%s_%s.html', $this->_a, $this->_m);
		$this->smarty->render($viewHtml, $this->viewData);
	}
  
}
