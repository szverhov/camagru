<?php
function __autoload($nameOfClass)
{
    $nameOfClass = ltrim($nameOfClass, '\\');
    $phpFile  = '';
    $namespace = '';
    if ($lstPosition = strripos($nameOfClass, '\\')) {
        $namespace = substr($nameOfClass, 0, $lstPosition);
        $nameOfClass = substr($nameOfClass, $lstPosition + 1);
        $phpFile  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    $phpFile .= str_replace('_', DIRECTORY_SEPARATOR, $nameOfClass) . '.php';
    require $phpFile;

}

use Engine\Application;
use Engine\DI\DI;

$di = new DI();

$services = require __DIR__ . '/Config/Service.php';

foreach ($services as $service)
	(new $service($di))->init();

(new Application($di))->run();
