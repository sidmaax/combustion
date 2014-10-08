<?php namespace Combustion\Errors;

class RouteNotFound extends \Exception {

	private $_message = null;

    public function __construct($uri, $message = 'Route not found') {
    	$this->_message = $message . " [" . $uri . ']';
    
        // make sure everything is assigned properly
        parent::__construct($this->_message, $code = 0, $previous = null);
    }

    // custom string representation of object
    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }

}