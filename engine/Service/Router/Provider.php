<?php

namespace Engine\Service\Router;

use Engine\Service\AbstractProvider;
use Engine\Core\Router\Router;

class Provider extends AbstractProvider
{
	public $_serviceName = 'router';

	public function init()
	{
		$router = new Router();
		$this->_di->set($this->_serviceName, $router);
	}
}
