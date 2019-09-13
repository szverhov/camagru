<?php

namespace Front\Controller;

use Engine\AbstractController;
use Engine\DI\DI;
use Front\Model\User;


class UserController extends AbstractController
{
	public function beforeAction()
	{
		// if (isset($_SESSION['logedUser']))
		// {
		// 	$this->redirect('/default/index');
		// }
	}

	public function actionSignIn()
	{
		if (isset($_SESSION['logedUser']))
			$this->redirect('/default/index', ['mainMessage' => 'Sorry u allredy loged in!']);

		if ($_POST && isset($_POST['Login'], $_POST['Password']))
		{
			if (($res = User::userLogin($_POST)))
			{
				if ($res == 'U must submit ur registration before sign in!')
				{
					$this->redirect('/user/sign-in', ['mainMessage' => $res]);	
				}
				$_SESSION['logedUser'] = $res;
				$this->redirect('/default/index', ['mainMessage' => 'Hello, u successfully signed in!']);
			}
			unset($_SESSION['logedUser']);
		}

		$this->render('signIn', []);
	}

	public function actionSignOut()
	{
		if (isset($_SESSION['logedUser']))
		{
			unset($_SESSION['logedUser']);
			$this->redirect('/user/sign-in', ['mainMessage' => 'Cya sunshine!']);	
		}
		$this->redirect('/default/index', ['mainMessage' => 'U not sign in!']);	
	}

	public function actionSignUp()
	{
		if ($_POST && isset($_POST['Login'], $_POST['Password'], $_POST['RePassword'], $_POST['Email']))
		{
			$res = User::registerUser($_POST);
			if ($res['error'])
				$this->redirect('/user/sign-up', ['mainMessage' => $res['message']]);
			$this->redirect('/user/sign-in', ['mainMessage' => $res['message']]);
		}
		$this->render('signUp', []);
	}

	public function actionCheckLoginExistence()
	{
		// if (!isset($_SESSION['logedUser']))
		// 	$this->redirect('/user/sign-in', ['mainMessage' => 'Please sign in to the system!']);		
		if ($_POST && isset($_POST['Login']))
			exit (json_encode(User::checkLogin($_POST['Login'])));	
	}

	public function actionCheckEmailExistence()
	{
		// if (!isset($_SESSION['logedUser']))
		// 	$this->redirect('/user/sign-in', ['mainMessage' => 'Please sign in to the system!']);
		if ($_POST && isset($_POST['Email']))
		{
			exit (json_encode(User::checkEmail($_POST['Email'])));
		}
	}

	public function actionConfirmEmail($token)
	{
		$res = User::confirmUser($token);
		$this->render('signIn', ['mainMessage' => $res['message']]);
	}

	public function actionForgotPassword()
	{
		if (isset($_SESSION['logedUser']))
			$this->redirect('/gallery', []);
		if ($_POST && isset($_POST['Email']))
		{
			$res = User::forgotPassword($_POST['Email']);
			$this->render('forgotPassword', [
				'mainMessage' => $res['message']
			]);
		}
		$this->render('forgotPassword', [

		]);
	}

	public function actionRestorePassword($token)
	{
		if (isset($_SESSION['logedUser']))
			$this->redirect('/gallery', []);
		$res = User::checkToken($token);
		if ($res['error'])
			$this->redirect('/user/forgotPassword', [
				'mainMessage' => $res['message'],
			]);

		if ($_POST && isset($_POST['Password'], $_POST['RePassword']))
		{
			$res = User::changePassword($token, $_POST['Password'], $_POST['RePassword']);
			if ($res['error'])
				$this->render('passwordRestoration', [
					'token' => $token,
					'mainMessage' => $res['message'],
				]);
			$this->redirect('/user/sign-in', ['mainMessage' => $res['message']]);
		}

		$this->render('passwordRestoration', [
			'token' => $token,
			'mainMessage' => $res['message'],
		]);
	}
}
