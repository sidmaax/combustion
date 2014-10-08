<?php namespace Combustion;

class Route {

	public static function get($uri, $action) {
		return Kernel::registerRoute('get', $uri, $action);
	}

	public static function post($uri, $action) {
		return Kernel::registerRoute('post', $uri, $action);
	}

}