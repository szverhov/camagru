<?php

namespace Front\Controller;

use Engine\AbstractController;
use Engine\DI\DI;
use Front\Model\User;

class DefaultController extends AbstractController
{
	// public function beforeAction()
	// {
	// 	echo 'asd';
	// }

	public function actionIndex()
	{
		if (!isset($_SESSION['logedUser']))
			$this->redirect('/user/sign-in', ['mainMessage' => 'Please sign in to the system!']);
		$this->render('index', ['var' => 'Main page']);
	}
}
