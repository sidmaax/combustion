<?php namespace Combustion;

class Response {

	public $_msg = 'OK';
	public $_code = 200;
	public $_type = 'text/html';
	public $_data = null;

	private $_header = array();

	public static function make() {
        static $instance = null;
        if (null === $instance) {
            $instance = new static();
        }

        return $instance;
    }

    /**
     * Protected constructor to prevent creating a new instance of the
     * *Response* via the `new` operator from outside of this class.
     */
    protected function __construct() {
    }

    /**
     * Private clone method to prevent cloning of the instance of the
     * *Response* instance.
     *
     * @return void
     */
    private function __clone() {
    }

    /**
     * Private unserialize method to prevent unserializing of the *Response*
     * instance.
     *
     * @return void
     */
    private function __wakeup() {
    }

    /**
     * Public method used to send the response
     * @return void
     */
	public function send() {
		header("HTTP/1.0 " . (string)$this->_code . " " . $this->_msg);
        header("Content-Type: " . $this->_type);
		if ( $this->_type === 'application/json') {
			if ( isset($this->_data) ) {
				echo json_encode($this->_data);
				exit;
			}
		} else {
            if ( isset($this->_data) ) {
                var_dump($this->_data);
                exit;
            }
        }
	}

}