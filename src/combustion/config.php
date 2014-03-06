<?php namespace Combustion;

/**
* Configuration class to abstract the $GLOBAL variable
*/
class Config {
    
    public static function get($path = null) {
        if($path) {
            include APP_PATH . "config" . EXT;
            $config = $GLOBALS['config'];
            $path = explode('/', $path);
            foreach($path as $bit) {
                if (isset($config[$bit])) {
                    $config = $config[$bit];
                }
            }

            return $config;
        }

        return false;
    }

}