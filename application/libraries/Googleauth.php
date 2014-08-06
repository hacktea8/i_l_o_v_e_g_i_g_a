<?php

require_once 'Google/Client.php';
require_once 'Google/Service/Oauth2.php';

class Googleauth{
 public $client_id = '775375367313-ksbboj7oukdhn4cqqcoip26u6qolrs6t.apps.googleusercontent.com';
 public $client_secret = '6c9qQOMJxf4UlY1c470aqlqu';
 public $redirect_uri = 'http://jgg.com/user/register';
 public $client;
 public $service;
 public $scope = array('openid','email');

 public function __construct(){
  $this->client = new Google_Client();
  $this->client->setClientId($this->client_id);
  $this->client->setClientSecret($this->client_secret);
  $this->client->setRedirectUri($this->redirect_uri);
  $this->client->addScope($this->scope);
  $this->service = new Google_Service_Oauth2($this->client);
  #$this->service = new Google_Service_Oauth2_Userinfoplus();
 }
 public function loginUrl(){
  return $authUrl = $this->client->createAuthUrl();
 }
 public function uinfo(){
  $uinfo = array();
  if (isset($_GET['code'])) {
   $this->client->authenticate($_GET['code']);
   #$_SESSION['access_token'] = $client->getAccessToken();
   $uinfo = $this->service->userinfo;
  }
  return $uinfo;
 }
}

?>
