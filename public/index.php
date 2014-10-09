<?php

define('ROOT_PATH', realpath(dirname(__FILE__) . "/../") . "/");
define('APP_PATH', ROOT_PATH . "app/");
define('LOG_FILE', ROOT_PATH . "app.log");
define('EXT', '.php');

require_once(ROOT_PATH . "vendor/autoload.php");

use Combustion\Kernel;

Kernel::init();

$uri = $_SERVER['REQUEST_URI'];

Kernel::process($uri);
