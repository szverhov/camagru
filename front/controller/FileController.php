<?php

namespace Front\Controller;

use Engine\AbstractController;
use Front\Model\UserFileSaver;
use Front\Model\Post;

class FileController extends AbstractController
{
	public function beforeAction()
	{
		if (!isset($_SESSION['logedUser']))
			$this->redirect('/user/sign-in', ['mainMessage' => 'Please sign in to the system!']);
	}

	public function actionSaveAjaxFile()
	{
		if ($_FILES)
			exit (json_encode(UserFileSaver::saveTmpEditorUserImage($_FILES)));
		exit;
	}

	public function actionSaveEditedPhoto()
	{
		if ($_POST && isset($_POST['EditedImg'], $_POST['ImageCaption']) && is_string($_POST['ImageCaption']) && is_string($_POST['EditedImg']) && mb_strlen($_POST['ImageCaption']) < 256)
		{
			$explodedArr = explode(',', $_POST['EditedImg']);
			if (count($explodedArr) == 2)
			{
				$fileName = UserFileSaver::saveUserGalleryImageFromBase64($explodedArr[1]);
				Post::savePost($fileName, $_POST['ImageCaption']);
				exit;
			}
		}
		exit;
	}
}
