<?php

class Bootstrap
{
	// Current request uri 
	private static $_uri = null;

	public static function init() {
		// Load config file
		// 
		// Read config 
		// 
		// Start required componenets accordingly
		
		// Starting up error handling
		$whoops = new \Whoops\Run;
		$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
		$whoops->register();

		// Setting current URI request
		self::$_uri = $_SERVER['REQUEST_URI'];
		
		// Returning self object for kernel initialization
		return new Bootstrap();
	}

	public function kernel() {
		Kernel::boot(self::$_uri);
	}
}