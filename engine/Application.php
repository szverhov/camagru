<?php

namespace Engine;

use Engine\DI\DI;

class Application
{
	private	$_di;
	public	$_router;

	public function __construct(DI $di)
	{
		$this->_di = $di;
		$this->_router = $di->get('router');
	}

	public function run()
	{
		$controller = "\\Front\\Controller\\" . $this->_router->getController() . "Controller";
		$func = 'action' . $this->_router->getAction();

		call_user_func_array([
			new $controller($this->_di),
			'beforeAction'
		], []);

		call_user_func_array([
			new $controller($this->_di),
			$func,
		], $_GET);
	}
}
