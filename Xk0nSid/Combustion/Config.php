<?php namespace Combustion;

class Config
{

	private static $_configFile = null;

	public static function get($path = null) {

		if ($path && self::$_configFile) {

			require self::$_configFile;

			$config = $GLOBALS['config'];
			$path = explode('/', $path);

			foreach($path as $bit) {
				if (isset($config[$bit])) {
					$config = $config[$bit];
				}
			}

			return $config;

		}

	}

	public static function setFile($file) {
		self::$_configFile = $file;
	}
}