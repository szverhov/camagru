<?php

namespace Front\Model;

class Profile
{
	public static function getAllUserData()
	{
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
		$res = $GLOBALS['di']->get('db')->queryOne($sql, []);
		return $res;
	}
}