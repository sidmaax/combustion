<?php namespace Combustion;

use Psr\Log\LoggerInterface;

class Logger implements LoggerInterface {

	private $_logFile;

	public function __construct($logFile) {
		$this->_logFile = fopen($logFile, 'w');
	}

	/**
     * System is unusable.
     *
     * @param string $message
     * @param array $context
     * @return null
     */
	public function emergency($message, array $context = array()) {
		
	}

    /**
     * Action must be taken immediately.
     *
     * Example: Entire website down, database unavailable, etc. This should
     * trigger the SMS alerts and wake you up.
     *
     * @param string $message
     * @param array $context
     * @return null
     */
    public function alert($message, array $context = array()) {
    	
    }

    /**
     * Critical conditions.
     *
     * Example: Application component unavailable, unexpected exception.
     *
     * @param string $message
     * @param array $context
     * @return null
     */
    public function critical($message, array $context = array()) {
    	
    }

    /**
     * Runtime errors that do not require immediate action but should typically
     * be logged and monitored.
     *
     * @param string $message
     * @param array $context
     * @return null
     */
    public function error($message, array $context = array()) {
    	$date = new \DateTime();
		if ( empty($context) ) {
			$errorString = "Error [" . $date->format('Y-m-d H:i:s') . "] :" . $message;
		} else {
			$errorString = "Error [" . $date->format('Y-m-d H:i:s') . "] :" . $message . " [ ";
			foreach($context as $key=>$value) {
				$errorString = $errorString . "(" . $key . "->" . $value . ") ";
			}
			$errorString = $errorString . "]";
		}
		fwrite($this->_logFile, $errorString);
    }

    /**
     * Exceptional occurrences that are not errors.
     *
     * Example: Use of deprecated APIs, poor use of an API, undesirable things
     * that are not necessarily wrong.
     *
     * @param string $message
     * @param array $context
     * @return null
     */
    public function warning($message, array $context = array()) {
    	$date = new \DateTime();
		if ( empty($context) ) {
			$errorString = "Warning [" . $date->format('Y-m-d H:i:s') . "] :" . $message;
		} else {
			$errorString = "Warning [" . $date->format('Y-m-d H:i:s') . "] :" . $message . " [ ";
			foreach($context as $key=>$value) {
				$errorString = $errorString . "(" . $key . "->" . $value . ") ";
			}
			$errorString = $errorString . "]";
		}
		fwrite($this->_logFile, $errorString);
    }

    /**
     * Normal but significant events.
     *
     * @param string $message
     * @param array $context
     * @return null
     */
    public function notice($message, array $context = array()) {
    	
    }

    /**
     * Interesting events.
     *
     * Example: User logs in, SQL logs.
     *
     * @param string $message
     * @param array $context
     * @return null
     */
    public function info($message, array $context = array()) {
    	$date = new \DateTime();
		if ( empty($context) ) {
			$errorString = "Notice [" . $date->format('Y-m-d H:i:s') . "] :" . $message;
		} else {
			$errorString = "Notice [" . $date->format('Y-m-d H:i:s') . "] :" . $message . " [ ";
			foreach($context as $key=>$value) {
				$errorString = $errorString . "(" . $key . "->" . $value . ") ";
			}
			$errorString = $errorString . "]";
		}
		fwrite($this->_logFile, $errorString);
    }

    /**
     * Detailed debug information.
     *
     * @param string $message
     * @param array $context
     * @return null
     */
    public function debug($message, array $context = array()) {
    	
    }

    /**
     * Logs with an arbitrary level.
     *
     * @param mixed $level
     * @param string $message
     * @param array $context
     * @return null
     */
    public function log($level, $message, array $context = array()) {
    	$date = new \DateTime();
		if ( empty($context) ) {
			$errorString = "LogMessage (Level ". $level .") [" . $date->format('Y-m-d H:i:s') . "] :" . $message;
		} else {
			$errorString = "LogMessage (Level ". $level .") [" . $date->format('Y-m-d H:i:s') . "] :" . $message . " [ ";
			foreach($context as $key=>$value) {
				$errorString = $errorString . "(" . $key . "->" . $value . ") ";
			}
			$errorString = $errorString . "]";
		}
		fwrite($this->_logFile, $errorString);
    }

    public function __destruct() {
    	fclose($this->_logFile);
    }

}