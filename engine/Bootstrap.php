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
		
		// Setting current URI request
		self::$_uri = $_SERVER['REQUEST_URI'];
		
		// Returning self object for kernel initialization
		return new Bootstrap();
	}

	public function kernel() {
		Kernel::boot(self::$_uri);
	}
}