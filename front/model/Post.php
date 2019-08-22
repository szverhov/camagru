<?php

namespace Front\Model;

class Post
{
	public static function savePost($imgName, $imageCaption)
	{
		$sql = "
			INSERT INTO `post`
				(`imageName`, `imagePath`, `caption`, `userID`)
			VALUES
				(:imageName, :imagePath, :caption, :userID)
		";
		$res = $GLOBALS['di']->get('db')->execute($sql, [
			':imageName'		=> $imgName,
			':imagePath'	=> "/files/userFiles/{$_SESSION['logedUser']}/userPhotos/",
			':caption'		=> $imageCaption,
			':userID'		=> $_SESSION['logedUser'],
		]);
	}
}