<?php

namespace Engine\Core\Router;

use Engine\Core\Router\RouteCreator;

class Router
{
	private $_route = [];

	public function __construct()
	{
		$this->_route = RouteCreator::getRoute();
	}

	public function getController()
	{
		return $this->_route['controller'];
	}

	public function getAction()
	{
		return $this->_route['action'];
	}
}