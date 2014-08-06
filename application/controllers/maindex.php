<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'viewbase.php';
class Maindex extends Viewbase {

	/**
	 */
  public function index(){
/**/
    echo "<pre>";
    $key = 'test';
    $this->_redis->set($key,'sdfawe');
    $this->_mem->set($key,'sdfawe');
    var_dump($this->_redis);
    var_dump($this->_redis->get($key));
    var_dump($this->_mem->get($key));exit;
/**/
    $this->_setView(array('_a'=>$this->_a,'_m'=>$this->_m));
    $viewHtml = sprintf('%s_%s.html', $this->_a, $this->_m);
    $this->smarty->render($viewHtml, $this->viewData);
	}
  /*
   文章列表
  */
  public function lists(){
    
  }
  /*
   文章内容
  */
  public function view(){

  }
}
