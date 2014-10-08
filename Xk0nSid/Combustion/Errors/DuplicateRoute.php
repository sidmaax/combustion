<?php namespace Combustion\Errors;

class DuplicateRoute extends \Exception {

	private $_message = null;

    public function __construct($route, $message = null) {
    	$this->_message = "Duplicate route found [" . $route . "]";
    
        // make sure everything is assigned properly
        parent::__construct($this->_message, 1, null);
    }

    // custom string representation of object
    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }

}