<?php

namespace Front\Controller;

use Engine\AbstractController;
use Front\Model\UserFileSaver;
use Front\Model\Post;

class GalleryController extends AbstractController
{
	public function actionIndex()
	{
		$this->render('index', []);
	}

	public function actionGetAllPostsData()
	{
		exit (json_encode(Post::getAllPosts()));
	}

	public function actionSaveLike()
	{
		if (!isset($_SESSION['logedUser']))
			throw new \Exception("You have no rights to access this page", 1);
		if ($_POST && isset($_POST['postID'], $_POST['userID']))
			Post::saveLike($_POST['postID'], $_POST['userID']);
		exit;
	}

	public function actionSaveComment()
	{
		if (!isset($_SESSION['logedUser']))
			throw new \Exception("You have no rights to access this page", 1);
		if ($_POST && isset($_POST['comment'], $_POST['postID'], $_POST['userID']))
			exit (json_encode(Post::saveComment($_POST['comment'], $_POST['postID'], $_POST['userID'])));
	}
}
