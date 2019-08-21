<?php

namespace Engine\Core\Router;

class RouteValidator
{
	public static function validateRoute($route)
	{
		$controller = "\\Front\\Controller\\" . $route['controller'] . "Controller";
		$func = 'action' . $route['action'];
		if (!class_exists($controller) || !method_exists($controller, $func) || !self::parameterCompare($controller, $func))
		{
			echo '404';
			exit;
		}
		return $route;
	}

	private static function parameterCompare($controller, $func)
	{
		$method = new \ReflectionMethod($controller, $func);
		$args = $method->getParameters();
		if (count($args) != count($_GET))
			return false;

		foreach ($args as $arg)
			if (!self::compareArgWithGet($arg->name))
				return false;
		return true;
	}

	private static function compareArgWithGet($arg)
	{
		foreach ($_GET as $key => $value)
			if ($key == $arg)
				return true;
		return false;
	}
}