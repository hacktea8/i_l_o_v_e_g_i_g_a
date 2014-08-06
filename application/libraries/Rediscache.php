<?php
class Rediscache{
  protected $_config = array(
    #'host'   => '127.0.0.1',
    'host'   => '192.168.1.244',
    'port'   => 6379,
    'timeout'  => 0
  );
  public $redis=null;
  public $pre = 'ggatw';
  public $expire = 3600;
  public function __construct() {
    $this->redis=new Redis();
    $this->redis->pconnect($this->_config['host'],$this->_config['port'],$this->_config['timeout']);
  }
  public function get_key($key){
    $len = strlen($this->pre);
    return substr($key,0,$len) === $this->pre?$key:$this->pre.$key;
  }
  public function set($key,$data){
    try{
      $key = $this->get_key($key);
      $this->redis->setex($key,$this->expire,$data);
    }catch(Exception $e){
    }
  }
  
  public function mset($data){
    if(is_array($data))
      return $this->redis->mset($data);
    else
      return false;
  } 
 
  public function get($key){
    try{
      if(is_array($key))
        return $this->redis->getMultiple($key);
      else{
        $key = $this->get_key($key);
        return $this->redis->get($key);
      }
    }catch(Exception $e){
      return null;
    }
  }
  public function push($key, $value ,$right = true){    
    $value = json_encode($value);
    $key = $this->get_key($key);   
    return $right ? $this->redis->rPush($key, $value) : $this->redis->lPush($key, $value);    
  }    
  public function pop($key , $left = true){
    $key = $this->get_key($key);
    $val = $left ? $this->redis->lPop($key) : $this->redis->rPop($key);    
    return json_decode($val,1);    
  }
  public function lrange($key,$start=null,$end = null){
    $key = $this->get_key($key);
    return $this->redis->lrange($key,$start,$end);
  } 
  public function sort($key,$option){
    $key = $this->get_key($key);
    return $this->redis->sort($key,$option);
  }
  public function sadd($key,$value){
    return $this->redis->sadd($key,$value);
  }
  public function srem($key,$value){
    $key = $this->get_key($key);
    return $this->redis->srem($key,$value);
  }
  public function scard($key){
    $key = $this->get_key($key);
    return $this->redis->scard($key);
  }
  public function sismember($key,$value){
    $key = $this->get_key($key);
    return $this->redis->sismember($key,$value);
  }
  public function zadd($key,$n,$value){
    $key = $this->get_key($key);
    return $this->redis->zadd($key,$n,$value);
  }
  public function zincrby($key,$n,$value){
    $key = $this->get_key($key);
    return $this->redis->zincrby($key,$n,$value);
  }
  public function zcard($key){
    $key = $this->get_key($key);
    return $this->redis->zcard($key);
  }
  public function zscore($key,$value){
    $key = $this->get_key($key);
    return $this->redis->zscore($key,$value);
  }
  public function len($key){
    $key = $this->get_key($key);
    return $this->redis->llen($key);
  }
  public function incr($key){
    $key = $this->get_key($key);
    $this->redis->incr($key);
  }
  public function keys($key){
    $key = $this->get_key($key);
    return $this->redis->keys($key);
  }
  public function flushAll(){    
    return $this->redis->flushAll();    
  } 
  public function delete($key){
    $key = $this->get_key($key);
    $this->redis->delete($key);
  }
}
?>
