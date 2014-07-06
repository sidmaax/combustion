<?php

// Define basic macros to be used througout the application

define("ROOT_PATH", realpath(dirname(__FILE__) . "/../") . "/");
define("APP_PATH", ROOT_PATH . "app/");
define("CSS_PATH", ROOT_PATH . "public/css/");
define("LIB_PATH", ROOT_PATH . "engine/");
define("EXT", ".php");

// Loading composer autoloader
require_once(ROOT_PATH . "vendor/autoload.php");

// Bootstrapping the application
Bootstrap::init()->kernel();