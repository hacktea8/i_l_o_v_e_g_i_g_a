<?php

require_once ROOTPATH.'Dbmysql.php';

class M{
 public $db;
 public function __construct(){
  $this->db = new Dbmysql();
 }
}
?>
