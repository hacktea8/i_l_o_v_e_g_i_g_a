<?php

require_once 'Facebook/facebook.php';

class Fbauth{
 public $appId = '699268566794850';
 public $secret = '46ce1ac8353a4e3c9d7dc32430e9f745';
 public $fb;
 
 public function __construct(){
  $this->fb = new Facebook(array(
  'appId'  => $this->appId,
  'secret' => $this->secret,
  ));
 }
 public function loginUrl($flag = 1){
  return $flag ? $this->fb->getLoginUrl(): $this->fb->getLogoutUrl();
 }
 public function uinfo(){
  $u = $this->fb->getUser();
  $uinfo = array('err'=>'No User!');
  if($u){
   $uinfo = $this->fb->api('/me');
  }
  return $uinfo;
 }
}

?>
