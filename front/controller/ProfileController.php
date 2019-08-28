<?php

namespace Front\Controller;

use Engine\AbstractController;
use Front\Model\Profile;
use Front\Model\User;


class ProfileController extends AbstractController
{
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
		if ($_POST && isset($_POST['Password']))
			exit (json_encode(User::checkPassword($_POST['Password'])));
	}

	public function actionChangePassword()
	{
		if ($_POST && isset($_POST['oldPassword'], $_POST['newPassword']))
			exit (json_encode(User::changePasswordNoToken($_POST['oldPassword'], $_POST['newPassword'])));
	}

}
