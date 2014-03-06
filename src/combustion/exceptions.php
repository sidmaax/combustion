<?php namespace Combustion;

class Exceptions {

    private static $_env;

    public static function init() {
        // Initialize whoops exception handling
        $whoops = new \Whoops\Run;
        $errorPage = new \Whoops\Handler\PrettyPageHandler;

        $errorPage->setPageTitle("Ooops! This is emabarrasing.");
        $errorPage->setEditor("sublime");

        $whoops->pushHandler($errorPage);
        $whoops->register();
    }

    public static function make($msg) {
        self::$_env = Config::get('app/env');
        if (self::$_env === "production") {
            // redirect to a generic error page
            die("Ooops!!! This is embarasing.");
        }
        else if(self::$_env === "debug") {
            throw new RuntimeException($msg);
        }
        else {
            throw new RuntimeException("app.env config can be either debug or production.");
        }

    }

}
