<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'webbase.php';

/* 视图基类 */
class Viewbase extends Webbase {
  public $smarty = null;

	/**
	 */
	public function __construct()
	{
    parent::__construct();
    $this->load->library('smartyview');
    $this->smarty = &$this->smartyview;
	}
}
