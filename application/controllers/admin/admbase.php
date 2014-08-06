<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'controllers/webbase.php';
class Admbase extends Webbase {
  public $smarty = null;

	/**
	 */
	public function __construct()
	{
    parent::__construct();
    $this->load->library('smartyview');
    $this->smarty = &$this->smartyview;
    $this->smarty->init(array('template_dir'=> APPPATH.'views/admin'));
    $this->lang->load('admin');
    $viewData = array('lang'=>$this->lang->language);
    #echo "<pre>";var_dump($this->smarty);exit;
    $this->_setView($viewData);
	}
}
