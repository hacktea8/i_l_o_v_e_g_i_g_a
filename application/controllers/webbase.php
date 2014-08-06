<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Webbase extends CI_Controller {
  public $viewData = array();
  public $_a = '';
  public $_m = '';
  public $_uInfo = array();
  public $_mem = '';
  public $_redis = '';


  public function __construct(){
    parent::__construct();
    $this->_a = $this->uri->segment(1) ? $this->uri->segment(1) : 'maindex';
    $this->_m = $this->uri->segment(2) ? $this->uri->segment(2) : 'index';
    $this->_mem = &$this->multicache;
    $this->_redis = &$this->rediscache;
  }
  public function _setView($data = array()){
    foreach($data as $k => $v){
      $this->viewData[$k] = $v;
    }
    return 1;
  }
}
