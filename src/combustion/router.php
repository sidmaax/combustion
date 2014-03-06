<?php namespace Combustion;

class Router {

    public static function get($path, $info) {
        $controller = explode('@', $info)[0];
        $action = explode('@', $info)[1];
        return Kernel::registerRoute($path, $controller, $action);
    }

    public static function dispatch($controller, $action) {
        $class = ucfirst($controller) . "Controller";

        $func = "get_" . $action;

        if ($controller && $action) {
            include APP_PATH . "controller/" . $controller . "_controller" . EXT;
            $tmp = new $class();
            $tmp->$func();
        }
        else {
            // throw exception
            Exceptions::make("Dispatch of route failed.");
        }
    }

}
