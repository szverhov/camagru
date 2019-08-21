<?php

namespace Engine\Core\Router;

use Engine\Core\Router\RouteValidator;

class RouteCreator
{
	public static function getRoute()
	{
		$route = [];
		$controller = 'Default';
		$action = 'Index';

		$uri = explode('?', $_SERVER['REQUEST_URI'])[0];
		if ($uri == '/')
			$uri = 'default/';
		if (isset($uri))
		{
			$arrUri = explode('/', trim($uri, '/'));
			if (count($arrUri) > 2)
			{
				echo "404";
				exit;
			}
			$controller = ucfirst(mb_strtolower($arrUri[0]));
			if (isset($arrUri[1]))
			{
				$action = '';
				$actionArr = explode('-', mb_strtolower($arrUri[1]));
				foreach ($actionArr as $val)
					$action .= ucfirst($val);
			}
		}

		return RouteValidator::validateRoute([
			'controller' => $controller,
			'action' => $action,
		]);
	}
}