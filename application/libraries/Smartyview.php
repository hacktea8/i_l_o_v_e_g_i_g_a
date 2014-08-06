<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

// get smarty lib
require_once 'Smarty-3.1.18/Smarty.class.php';

// main class
class Smartyview {
	// global smarty object
	private $smarty;
	
	// construct
	public function __construct() {
    $config = array(
    'smarty_template_dir' => APPPATH.'views', // base folder for all your templates
    'smarty_compile_dir' => APPPATH.'cache/smarty/templates_c', // where templates will be compiled to
    'smarty_config_dir' => APPPATH.'views/_config', // place to hold template config files
    'smarty_cache_dir' => APPPATH.'cache/smarty' ,// universal smarty cache directory
    'left_delimiter' => '<!--{',
    'right_delimiter' => '}-->'
    );
		// setup the object
		$this->smarty = new Smarty();
		$this->smarty->template_dir = $config['smarty_template_dir'];
		$this->smarty->compile_dir = $config['smarty_compile_dir'];
		$this->smarty->config_dir = $config['smarty_config_dir'];
		$this->smarty->cache_dir = $config['smarty_cache_dir'];
    $this->smarty->left_delimiter = $config['left_delimiter'];
    $this->smarty->right_delimiter = $config['right_delimiter'];
	}
	public function init($config = array()){
    foreach($config as $k => $v){
      $this->smarty->$k = $v;
    }
    return 1;
  }
	// compile and output the template
	public function render($template = '', $data = array() , $isFetch = null) {
		// get codeigniter object
		$CI =& get_instance();
		
		// assign template variables
		$this->smarty->assign($data);
		$this->smarty->assign('CI', $CI);
		
		// output the template
		$output = $this->smarty->fetch($template);
    if($isFetch)
        return $output;

		$CI->output->append_output($output);
	}
	
}
