<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'webbase.php';
class Ajax extends Webbase {


  public function __construct(){
    if( !$this->input->is_ajax_request()){
      die(0);
    }
  }
	/**
   
	*/
	public function index(){
    $this->_setView(array('_a'=>$this->_a,'_m'=>$this->_m));
    $viewHtml = sprintf('%s_%s.html', $this->_a, $this->_m);
		$this->smarty->render($viewHtml, $this->viewData);
	}
  
}
