<?php namespace Combustion;

class Config {

	public static function get($prop) {
		require_once APP_PATH . "config.php";

		if ( isset($config[$prop]) ) {
			return $config[$prop];
		}
		else {
			return false;
		}
	}

}