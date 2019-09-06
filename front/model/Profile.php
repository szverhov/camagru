<?php

namespace Front\Model;

class Profile
{
	public static function getAllUserData()
	{
		$res = [];
		$sql = "
			SELECT
				user.login,
				user.creation_date,
				user.alerts,
				user_info.*
			FROM `user`
			LEFT JOIN user_info ON user_info.userID = user.id
			WHERE user.id = {$_SESSION['logedUser']}
		";
		$res['user'] = $GLOBALS['di']->get('db')->queryOne($sql, []);

		$sql = "
			SELECT
				post.*,
				(SELECT COUNT(*) FROM post_like WHERE post_like.postID = post.id) as likeCount
			FROM `post`
			LEFT JOIN user ON user.id = post.userID
			WHERE user.id = {$_SESSION['logedUser']}
			ORDER BY `date` DESC
		";
		$res['posts'] = $GLOBALS['di']->get('db')->queryAll($sql, []);

		foreach ($res['posts'] as $resIndx => $post)
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
			$res['posts'][$resIndx]['comments'] = $GLOBALS['di']->get('db')->queryAll($sql, []);
		}

		return $res;
	}

	public static function deletePost($postID)
	{
		$sql = "
			SELECT
				post.*
			FROM `post`
			WHERE post.userID = {$_SESSION['logedUser']} AND post.id = :postID
			ORDER BY `date` DESC
		";
		$res = $GLOBALS['di']->get('db')->queryOne($sql, ['postID' => $postID]);
		if ($res)
		{
			$sql = "
				DELETE FROM post WHERE post.id = :postID
			";
			$res = $GLOBALS['di']->get('db')->execute($sql, ['postID' => $postID]);
		}
		else
		{
			throw new Exception("U have no permission to do this!", 1);
		}
	}
}