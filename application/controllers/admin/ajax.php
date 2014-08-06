<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'admbase.php';

/* ajax请求 */
class Ajax extends Admbase {
  public $dropType = array('article'=>'文章model','user'=>'');
  
  
	/**
   删除记录的动作 类型、ID
	*/
	public function drop($type,$rid){
    
	}
  
}
