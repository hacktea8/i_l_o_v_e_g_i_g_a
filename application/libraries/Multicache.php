<?php

class Multicache {
  public $config = array();
  public $pre = 'ggatw';
  public $expire = 0;

  public function __construct(){
		$this->config['cache_type'] = "memcache";
		$this->config['memcache_servers'][] = array(
			'host' => '10.52.21.3',
			'port' => 11211
		);
		
		$this->expire = 3600;
		$this->connected_servers = array();
		$this->_connect();
	}
	public function _getKey(&$key){
    $len = strlen($this->pre);
    $key = substr($key,0,$len) == $this->pre?$key:$this->pre.$key;
  }	
	public function _connect(){
		switch ( $this->config['cache_type'] ){
			case 'memcache':
				if ( function_exists('memcache_connect') ){
					$this->memcache = new Memcache;
					$this->_connect_memcache();
				}

			case 'apc':
					// Nothing needs to be done here :)
				break;
		}
	}
		
	public function _connect_memcache(){
		if ( !empty($this->config['memcache_servers']) ){

			$error_display = ini_get('display_errors');
			$error_reporting = ini_get('error_reporting');

			ini_set('display_errors', "Off");
			ini_set('error_reporting', 0);

			foreach ( $this->config['memcache_servers'] as $server ){
				if ( $this->memcache->addServer($server['host'], $server['port']) ){
					$this->connected_servers[] = $server;
				}
			}
				// back on again!

			ini_set('display_errors', $error_display);
			ini_set('error_reporting', $error_reporting);
		}
	}
		
	public function get($key){
    $this->_getKey($key);
		switch ( $this->config['cache_type'] ){
			case 'memcache':	
				if ( empty($this->connected_servers) ){
					return false;
				}
	
				return $this->memcache->get($key);
					
			break;
				
			case 'apc':
				return apc_fetch($key);
			break;
		}
	}
		
	public function set($key, $data,$time = 0){
    $time = $time ? $time : $this->expire;
    $this->_getKey($key);
		switch ( $this->config['cache_type'] ){
			case 'memcache':
				if ( empty($this->connected_servers) ){
					return false;
				}
	
				return $this->memcache->set($key, $data, 0, $time);
			break;
				
			case 'apc':
				apc_store($key, $data, $time); 
			break;
		}
	}
		
	public function replace($key, $data){
    $this->_getKey($key);
		switch ( $this->config['cache_type'] ){
			case 'memcache':
				if ( empty($this->connected_servers) ){
					return false;
				}

				return $this->memcache->replace($key, $data, 0, $this->expire);
			break;

			case 'apc':
				apc_delete($key);
				apc_store($key, $data, $this->expire); 
			break;
		}
	}
		
	public function delete($key, $when = 0){
    $this->_getKey($key);
		switch ( $this->config['cache_type'] ){
			case 'memcache':
				if ( empty($this->connected_servers) ){
					return false;
				}
				return $this->memcache->delete($key, $when);
			break;
			case 'apc':
				apc_delete($key); 
			break;
		}
	}
}
?>
