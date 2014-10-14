<?php namespace Combustion;

class Ninja {

	protected $_file = null;
	protected $_vars = array();

	public function __construct($file) {
		$this->_file = $file;
	}

	public function __set($var , $value) {
		$this->_vars[$var] = $value;
	}

	public function __get($var) {
		return $this->_vars[$var];
	}

	public function output() {
	    if (!file_exists($this->_file . TPL_EXT . EXT)) {
	    	throw new \Combustion\Errors\TemplateNotFound($this->_file);
	    }
	    $output = file_get_contents($this->_file . TPL_EXT . EXT);
	  
	    foreach ($this->_vars as $key => $value) {
	        $tagToReplace = "{@$key}";
	        $output = str_replace($tagToReplace, $value, $output);
	    }
	  
	    return $output;
	}

}