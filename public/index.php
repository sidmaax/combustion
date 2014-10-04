<?php

define('ROOT_PATH', realpath(dirname(__FILE__) . "/../") . "/");
define('APP_PATH', ROOT_PATH . "app/");

require_once(ROOT_PATH . "vendor/autoload.php");

use Xk0nSid\Combustion\Kernel;

Kernel::init();

$uri = $_SERVER['REQUEST_URI'];

Kernel::dispatch($uri);


// Kernel::dispatch($controller, $method)