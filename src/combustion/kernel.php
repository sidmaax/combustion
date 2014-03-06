<?php namespace Combustion;

class Kernel {

    private static $_routes = array();

    public static function start($uri = null) {
        if (isset(self::$_routes[$uri])) {
            return Router::dispatch(self::$_routes[$uri][0], self::$_routes[$uri][1] );
        }
        else {
            // throw exception, route does not exist
            Exceptions::make("Could not find the route '" . $uri . "'.");
        }
    }

    public static function registerRoute($route = null, $controller, $action) {
        if ($route && $controller && $action) {
            self::$_routes[$route] = array($controller, $action);
        }
        else {
            // throw an exception
        }
    }

}
