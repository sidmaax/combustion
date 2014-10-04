<?php namespace Xk0nSid\Combustion;

use Xk0nSid\Combustion\Config;

class Kernel {

	public function __construct() {
		echo "Kernel called";
	}

	public static function init() {

		// Setup error handling
		if ( Config::get('debug') ) {
			// Initialized pretty error handling
			$whoops = new \Whoops\Run;
			$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
			$whoops->register();
		} else {
			// Display no errors
			ini_set('error_reporting', '0');
		}

	}

	public static function dispatch($uri) {

		// Temp handle for index
		if ( $uri === '/' ) {
			$controller = 'home';
			$method = 'index';
		}
		else {
			$uri = explode('/', $uri);

			$controller = $uri[1];
			$method = $uri[2];
		}

		$className = ucfirst($controller)."Controller";

		// Require the controller file
		require_once( APP_PATH . "controllers/" . ucfirst($controller) . "Controller.php" );

		// Create new object of controller
		$obj = new $className;

		// Call appropriate method in controller
		$obj->$method();
		
	}

}