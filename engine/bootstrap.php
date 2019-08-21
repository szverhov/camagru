<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Engine\Application;
use Engine\DI\DI;

$di = new DI();

$services = require __DIR__ . '/Config/Service.php';

foreach ($services as $service)
	(new $service($di))->init();

(new Application($di))->run();
