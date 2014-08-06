<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'viewbase.php';
class User extends Viewbase {

	/**
	 */
	public function index(){
    $this->_setView(array('_a'=>$this->_a,'_m'=>$this->_m));
    $viewHtml = sprintf('%s_%s.html', $this->_a, $this->_m);
		$this->smarty->render($viewHtml, $this->viewData);
	}
  /*
   接收POST登录参数
  */
  public function login(){
    
  }
  /*
   用户注册UI
  */
  public function register(){
    $this->load->library('googleauth');
    if(isset($_GET['code'])){
      $uinfo = $this->googleauth->uinfo();
    echo "<pre>";  var_dump($uinfo->get());exit;
    }
    echo $this->googleauth->loginUrl();exit;
    
  }
  /*
   接收POST注册参数
  */
  public function doreg(){
    
  }
  /*
   绑定账户
  */
  public function otherBind(){

  }
  /*
   第三方登录回调
  */
  public function otherLogin(){

  }
  /*
   更新用户资料
  */
  public function uinfo(){

  }
  /*
   接受POST
  */
  public function doUinfo(){

  }
  /*
   退出登录
  */
  public function logout(){
    
  }
  /*
   找回密码
  */
  public function losepwd(){
    
  }
  /*
   重置密码
  */
  public function resetpwd(){
    
  }
}
