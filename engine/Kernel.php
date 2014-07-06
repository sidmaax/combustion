<?php

class Kernel
{

	// Controllers directory
	private static $_ctrl_dir = null;

	// Models directory
	private static $_model_dir = null;

	// Views directory
	private static $_view_dir = null;

	// Boots (metaphorically) the application system
	public static function boot($uri = null) {

		// If URI is set 
		if (isset($uri))
		{
			// Setting controllers directory
			self::$_ctrl_dir = APP_PATH . "controllers/";

			// Breaking URI into controller and method/action
			$uri_string = explode("/", $uri);

			// if controller and model is empty
			// assume the call is to 'home' controller
			// and 'index' method
			if (!empty($uri_string[1])) {
				$controller_string = $uri_string[1];

				// If method is mssing
				// Assume the method is index of controller
				if (!empty($uri_string[2])) {
					$method_string = $uri_string[2];
				}
				else {
					$method_string = "index";
				}
			}
			else {
				$controller_string = "home";
				$method_string = "index";
			}
			echo "works till here...";

		}
	}

	private static function launchClass($controller, $method)
	{
		$ctrl_file = self::$_ctrl_dir . $controller . EXT;
		$method_name = "get_" . $method;
		$classname = ucfirst($controller) . "Controller";

		require $ctrl_file;

		$tmpobj = new $classname();
		$tmpobj->$method_name();
	}

	public static function regRoute($uri, $map) {

	}
}