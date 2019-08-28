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
				(SELECT COUNT(*) FROM post_like WHERE post_like.postID = post.id) as likeCount,
				(SELECT COUNT(*) FROM post_like WHERE post_like.postID = post.id AND post_like.userID = {$_SESSION['logedUser']}) as allreadyLiked
			FROM `post`
			LEFT JOIN user ON user.id = post.userID
			WHERE 1
			ORDER BY `date`
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
		$res = $GLOBALS['di']->get('db')->queryOne($sql, [':userID' => $userID, ':postID' => $postID]);
		if (!$res)
		{
			$sql = "
				INSERT INTO post_like
					(`userID`, `postID`)
				VALUES
					(:userID, :postID)
			";
			$res1 = $GLOBALS['di']->get('db')->execute($sql, [':userID' => $userID, ':postID' => $postID]);
		}
		else
		{
			$sql = "
				DELETE FROM post_like
				WHERE userID = :userID AND postID = :postID
			";
			$res1 = $GLOBALS['di']->get('db')->execute($sql, [':userID' => $userID, ':postID' => $postID]);
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
			':userID' => $userID,
			':postID' => $postID
		]);

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