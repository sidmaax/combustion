<?php namespace Combustion\Errors;

class TemplateNotFound extends \Exception {

    private $_message;

    public function __construct($tmpFile, $message = 'Template not found') {
    	$this->_message = $message . " [" . $tmpFile . ']';
    
        // make sure everything is assigned properly
        parent::__construct($this->_message, $code = 0, $previous = null);
    }

    // custom string representation of object
    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }

}