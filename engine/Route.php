<?php

class Route
{
	public static function get($uri, $map) {

		Kernel::regRoute($uri, $map);

		$map = explode('@', $map);
		if (sizeof($map) < 2 ) {
			die('You need to mention the controller and method in routes.');
		}
		$controller = $map[0];
		$method = $map[1];

		Kernel::launchClass($controller, $method);
	}
}