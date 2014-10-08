<?php namespace Combustion;

use Combustion\Config;

class Kernel {

	private static $_getRoutes = array();
	private static $_postRoutes = array();

	public static function init() {

		// setup configuration
		Config::setFile(APP_PATH . "config" . EXT);

		// Setup error handling
		if ( Config::get('debug') ) {
			// Initialized pretty error handling
			$whoops = new \Whoops\Run;
			$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
			$whoops->register();
		} else {
			// Setup custom exception handler
			set_exception_handler(function($e) {
				echo $e->getMessage();
				exit;
			});

			// Setup custom error handler
			set_error_handler(function($e) {
				var_dump($e);
				exit;
			});
		}

		// Setup class aliases for easy access
		$aliases = Config::get('aliases');
		foreach($aliases as $class=>$alias) {
			class_alias($class, $alias);
		}

		// Register routes
		require_once(APP_PATH . "routes" . EXT);


	}

	public static function registerRoute($type, $uri, $action) {
		// check type
		if ( $type === 'get' ) {
			if ( array_key_exists($uri, self::$_getRoutes) ) {
				throw new \Combustion\Errors\DuplicateRoute($uri);
				return;
			}
			else {
				self::$_getRoutes[$uri] = $action;
			}
		}
		if ( $type === 'post' ) {
			if ( array_key_exists($uri, self::$_postRoutes) ) {
				throw new \Combustion\Errors\DuplicateRoute($uri);
				return false;
			} else {
				self::$_postRoutes[$uri] = $action;
				return true;	
			}
		}

		return false;
	}

	public static function process($uri) {

		// Check request typ
		if ( $_SERVER['REQUEST_METHOD'] === 'GET' ) {

			// Check if route is registered in get global variable
			if ( array_key_exists($uri, self::$_getRoutes) ) {
				// Dispatch route if registered
				$action = self::$_getRoutes[$uri];
				self::dispatch($action);
			}
			else {
				// else throw an exception
				throw new \Combustion\Errors\RouteNotFound($uri);
			}

		} else if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
			// Check if route is registered in post global variable
			if ( array_key_exists($uri, self::$_postRoutes) ) {
				// Dispatch route if registered
				$action = self::$_postRoutes[$uri];
				self::dispatch($action);
			}
			else {
				// else throw an exception
				throw new \Combustion\Errors\RouteNotFound($uri);
			}
		} else {
			throw new \Exception("Unknown request type");
			
		}

	}

	private static function dispatch($action) {

		$action = explode('@', $action);

		$controller = $action[0];
		$method = $action[1];

		$className = ucfirst($controller)."Controller";

		// Require the controller file
		require_once( APP_PATH . "controllers/" . ucfirst($controller) . "Controller.php" );

		// Create new object of controller
		$obj = new $className;

		// Call appropriate method in controller
		$obj->$method();
		
	}

}