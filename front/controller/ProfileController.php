<?php

namespace Front\Controller;

use Engine\AbstractController;
use Front\Model\Profile;
use Front\Model\User;


class ProfileController extends AbstractController
{

	public function beforeAction()
	{
		if (!isset($_SESSION['logedUser']))
			$this->redirect('/user/sign-in', ['mainMessage' => 'Please sign in to the system!']);
	}

	public function actionDeletePost()
	{
		$res = [];
		try
		{
			if ($_POST && isset($_POST['PostID']))
				exit (json_encode(Profile::deletePost($_POST['PostID'])));
		} catch (Exception $e) {
			$res['success'] = 0;
			$res['message'] = $e->getMessage();
		}
		exit (json_encode($res));
	}


	public function actionChangeNotif()
	{
		if ($_POST && isset($_POST['UserID']))
		{
			exit (json_encode(Profile::changeNotifications($_POST['UserID'])));
		}
	}

	public function actionIndex()
	{
		$this->render('index', []);
	}

	public function actionGetUserData()
	{
		exit (json_encode(Profile::getAllUserData()));
	}

	public function actionCheckPassword()
	{
		$res = [];
		if ($_POST && isset($_POST['Password']))
		{
			try
			{
				User::checkUserPassword($_POST['Password']);
				$res = [
					'success' => 1,
					'message' => 'okay',
				];
			}
			catch (\Exception $e)
			{
				$res = [
					'success' => 0,
					'message' => $e->getMessage(),
				];
			}
		}
		exit (json_encode($res));

	}

	public function actionCheckLogin()
	{
		$res = [];
		if ($_POST && isset($_POST['Login']))
		{
			try
			{
				User::validateLogin($_POST['Login']);
				User::checkLoginOnDuplicate($_POST['Login']);
				$res = [
					'success' => 1,
					'message' => 'okay',
				];
			}
			catch (\Exception $e)
			{
				$res = [
					'success' => 0,
					'message' => $e->getMessage(),
				];
			}
		}
		exit (json_encode($res));
	}

	public function actionChangePassword()
	{
		if ($_POST && isset($_POST['oldPassword'], $_POST['newPassword']))
			exit (json_encode(User::changePasswordNoToken($_POST['oldPassword'], $_POST['newPassword'])));
	}

	public function actionChangeLogin()
	{
		if ($_POST && isset($_POST['newLogin'], $_POST['currPassw']))
		{
			try
			{
				User::changeLogin($_POST['newLogin'], $_POST['currPassw']);
				$res = [
					'success' => 1,
					'message' => 'Login changed successfully'
				];
			}
			catch (\Exception $e)
			{
				$res = [
					'success' => 0,
					'message' => $e->getMessage(),
				];
			}
			exit (json_encode($res));
		}
		throw new \Exception("Only POST data processing!", 1);
	}

	public function actionChangeEmail()
	{
		$res = [];
		if ($_POST && isset($_POST['newEmail'], $_POST['currPassw']))
		{
			try
			{
				User::changeEmail($_POST['newEmail'], $_POST['currPassw']);
				$res = [
					'success' => 1,
					'message' => 'Login changed successfully',
				];				
			}
			catch (\Exception $e)
			{
				$res = [
					'success' => 0,
					'message' => $e,
				];	
			}
			exit (json_encode($res));
		}
		throw new \Exception("Only POST data processing!", 1);
	}

	public function actionCheckEmail()
	{
		$res = [];
		if ($_POST && isset($_POST['Email']))
		{
			try
			{
				User::checkEmailBeforeChange($_POST['Email']);
				$res = [
					'success' => 1,
					'message' => 'okay',
				];
			}
			catch (\Exception $e)
			{
				$res = [
					'success' => 0,
					'message' => $e->getMessage(),
				];
			}
			exit (json_encode($res));
		}
		throw new \Exception("Only POST data processing!", 1);
	}

	public function actionRegexPassword()
	{
		$res = [];
		if ($_POST && isset($_POST['Password']))
		{
			if (!User::validatePassword($_POST['Password']))
			{
				$res = [
					'success' => 0,
					'message' => 'Password must be bettwen 8 to 64 characters long and contains a mix of upper and lower case characters, one numeric and one special characters.',
				];				
			}
			else
			{
				$res = [
					'success' => 1,
					'message' => 'Password valid',
				];				
			}
			exit (json_encode($res));
		}
		throw new \Exception("Only POST data processing!", 1);
	}

}
