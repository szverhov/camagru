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
			':caption'		=> htmlspecialchars($imageCaption),
			':userID'		=> $_SESSION['logedUser'],
		]);
	}

	public static function getAllPosts()
	{
		$sql = "
			SELECT
				post.*,
				user.login,
				(SELECT COUNT(*) FROM post_like WHERE post_like.postID = post.id) as likeCount";
		if (isset($_SESSION['logedUser']))
			$sql .=	",(SELECT COUNT(*) FROM post_like WHERE post_like.postID = post.id AND post_like.userID = {$_SESSION['logedUser']}) as allreadyLiked";
		$sql .=	"
			FROM `post`
			LEFT JOIN user ON user.id = post.userID
			WHERE 1
			ORDER BY `date` DESC
		";
		$res = $GLOBALS['di']->get('db')->queryAll($sql, []);
		foreach ($res as $resIndx => $post)
		{
			$sql = "
				SELECT
					post_comment.*,
					user.login
				FROM post_comment
				LEFT JOIN user ON user.id = post_comment.userID
				WHERE post_comment.postID = {$post['id']}
				ORDER BY `date`
			";
			$res[$resIndx]['comments'] = $GLOBALS['di']->get('db')->queryAll($sql, []);
		}
		return $res;
	}

	public static function saveLike($postID, $userID)
	{
		$sql = "
			SELECT
				*
			FROM `post_like`
			WHERE post_like.userID = :userID AND post_like.postID = :postID
		";


		//send mesage to post owner
		$res = $GLOBALS['di']->get('db')->queryOne($sql, [':userID' => $_SESSION['logedUser'], ':postID' => $postID]);
		if (!$res)
		{
			$sql = "
				INSERT INTO post_like
					(`userID`, `postID`)
				VALUES
					(:userID, :postID)
			";
			$res1 = $GLOBALS['di']->get('db')->execute($sql, [':userID' => $_SESSION['logedUser'], ':postID' => $postID]);
		}
		else
		{
			$sql = "
				DELETE FROM post_like
				WHERE userID = :userID AND postID = :postID
			";
			$res1 = $GLOBALS['di']->get('db')->execute($sql, [':userID' => $_SESSION['logedUser'], ':postID' => $postID]);
		}		
	}

	public static function saveComment($comment, $postID, $userID)
	{
		$sql = "
			INSERT INTO post_comment
				(`text`, `userID`, `postID`)
			VALUES
				(:comment, :userID, :postID)
		";
		$res = $GLOBALS['di']->get('db')->execute($sql, [
			':comment' => htmlspecialchars($comment),
			':userID' => $_SESSION['logedUser'],
			':postID' => $postID,
		]);

		$sql = "
			SELECT notifications FROM user WHERE id = {$userID}
		";

		$res = $GLOBALS['di']->get('db')->queryOne($sql, []);

		if ($res['notifications'] && $userID != $_SESSION['logedUser'])
		{
			$sql = "
				SELECT login FROM user WHERE id = {$_SESSION['logedUser']}
			";

			$res = $GLOBALS['di']->get('db')->queryOne($sql, []);
			$login = $res['login'];

			$sql = "
				SELECT email FROM user WHERE id = {$userID}
			";

			$res = $GLOBALS['di']->get('db')->queryOne($sql, []);
			$email = $res['email'];

			$GLOBALS['di']->get('mailer')->sendMasage(
				$email,
				'Notification',
				"<p>{$login} coment ur photo!</p>"
			);			
		}

		$sql = "
			SELECT
				post_comment.*,
				user.login
			FROM `post_comment`
			LEFT JOIN user ON user.id = post_comment.userID
			WHERE post_comment.text = :comment
		";
		return $GLOBALS['di']->get('db')->queryOne($sql, [':comment' => htmlspecialchars($comment)]);
	}
}