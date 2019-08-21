<?php

namespace	Engine;
use			Engine\DI\DI;

abstract class AbstractController
{
	protected $di;
	protected $dbConnection;

	public function __construct(DI $di)
	{
		$this->di = $di;
		$GLOBALS['di'] = $di;
	}

	public function render($viewName, $vars = [])
	{
		$viewFolder = $this->getClassViewFolder();

		ob_start();
		if (isset($_SESSION['redirectVars']))
		{
			foreach ($_SESSION['redirectVars'] as $key => $value)
				${$key} = $value;
			unset($_SESSION['redirectVars']);
		}
		foreach ($vars as $key => $value)
			${$key} = $value;
		$body = __DIR__ . '/../front/view/' . $viewFolder . '/' . $viewName . '.php';
		include __DIR__ .    '/../front/view/layouts/mainLayout.php';
		exit;
	}

	public function redirect($url, $vars = [])
	{
		$_SESSION['redirectVars'] = $vars;
		header("Location: {$url}");
		exit;
	}

	private function getClassViewFolder()
	{
		$arr = explode('\\', get_class($this));
		$controllerName = str_replace('Controller', '', $arr[count($arr) - 1]);
		return strtolower($controllerName);
	}

	public function beforeAction(){}
}