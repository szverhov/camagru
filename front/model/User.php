<?php

namespace Front\Model;

class User
{
	public static function checkLogin($login)
	{
		$sql = "
			SELECT user.login FROM `user` WHERE user.login = :login AND user.access_level != 0
		";
		$res = $GLOBALS['di']->get('db')->queryOne($sql, [':login' => $login]);
		if (!empty($res))
			return true;
		return false;
	}

	public static function checkEmail($email)
	{
		$sql = "
			SELECT user.email FROM `user` WHERE user.email = :email AND user.access_level != 0
		";
		$res = $GLOBALS['di']->get('db')->queryOne($sql, [':email' => $email]);
		if (!empty($res))
			return true;
		return false;
	}

	public static function registerUser($post)
	{
		if (self::checkLogin($post['Login']) || self::checkEmail($post['Email']))
			return [
				'error' => true,
				'message' => 'This email or login allready in use, dont try to cheat!',
			];
		if (!self::validatePassword($post['Password']) || !self::validatePassword($post['RePassword']) || $post['Password'] != $post['RePassword'])
			return [
				'error' => true,
				'message' => '<p>Somthing wrong with password, dont try to cheat!</p>',				
			];
		$sql = "
			SELECT user.id FROM `user` WHERE user.login = :login AND user.email = :email
		";
		$res = $GLOBALS['di']->get('db')->queryOne($sql, [':login' => $post['Login'], ':email' => $post['Email']]);
		if (!empty($res))
		{
			$sql = "
				UPDATE `user`
				SET
					user.login = :login,
					user.email = :email,
					user.password = :password,
					user.access_level = :access_level,
					user.confirm_hash = :confirm_hash
				WHERE user.id = {$res['id']}
			";	
		}
		else
		{
			$sql = "
				INSERT INTO user
					(`login`, `email`, `password`, `access_level`, `confirm_hash`)
				VALUES
					(:login, :email, :password, :access_level, :confirm_hash)
			";
		}
		$confirm_hash = hash('md5', time());
		$res = $GLOBALS['di']->get('db')->execute($sql, [
			':login'		=> $post['Login'],
			':email'		=> $post['Email'],
			':password'		=> hash('whirlpool', $_POST['Password']),
			':access_level' => '0',
			':confirm_hash' => $confirm_hash,
		]);
		$confirmUrl =  $_SERVER['HTTP_HOST'] . '/user/confirm-email?token=' . $confirm_hash;
		$GLOBALS['di']->get('mailer')->sendMasage(
			$post['Email'],
			'Camagru registration',
			"<p>Folow the link to confirm registration on Camagru</p>
			<a href='http://{$confirmUrl}'>http://{$confirmUrl}</a>"
		);
		return [
			'error' => false,
			'message' => 'U successfully signed up! please check ur email to confirm ur registration!'
		];
	}

	public static function confirmUser($token)
	{
		$sql = "
			SELECT user.id FROM `user` WHERE user.confirm_hash = :token
		";
		$res = $GLOBALS['di']->get('db')->queryOne($sql, [':token' => $token]);
		if (!empty($res))
		{
			$sql = "
				UPDATE `user` SET user.access_level = 1, user.confirm_hash = NULL WHERE user.id = :id
			";
			$GLOBALS['di']->get('db')->execute($sql, [
				':id' => $res['id'],
			]);			
			return [
				'error' => false,
				'message' => "<p>Ur account confirmed! Just enter system using form below: </p>",
			];
		}
		return [
			'error' => true,
			'message' => "<p>This token allready expired or isnt valid, to get new one use form below: </p>",
		];
	}

	public static function userLogin($post)
	{
		$sql = "
			SELECT user.id FROM `user` WHERE (user.login = :login AND user.password = :password) OR (user.email = :login AND user.password = :password)
		";
		$res = $GLOBALS['di']->get('db')->queryOne($sql, [
			':login' => $post['Login'],
			':password' => hash('whirlpool', $post['Password']),
		]);
		if (!$res)
			return false;
		return $res['id'];
	}

	public static function forgotPassword($email)
	{
		$sql = "
			SELECT * FROM `user` WHERE user.email = :email
		";
		$res = $GLOBALS['di']->get('db')->queryOne($sql, [
			':email' => $email,
		]);
		if (empty($res))
			return [
				'error' => true,
				'message' => "This email not registered.",
			];
		else if ($res['access_level'] < 1)
			return [
				'error' => true,
				'message' => "U didnt confirm ur email registration, u cant restore password.",
			];
		else
		{
			$restore_hash = hash('md5', time());
			$sql = "
				UPDATE `user`
				SET
					user.confirm_hash = :restore_hash
				WHERE user.id = {$res['id']}
			";
			$GLOBALS['di']->get('db')->execute($sql, [
				':restore_hash' => $restore_hash,
			]);
			$confirmUrl =  $_SERVER['HTTP_HOST'] . '/user/restore-password?token=' . $restore_hash;
			$GLOBALS['di']->get('mailer')->sendMasage(
				$email,
				'Camagru password restoration',
				"<p>Folow the link to confirm password restoration</p>
				<a href='http://{$confirmUrl}'>http://{$confirmUrl}</a>"
			);
		}
		return [
			'error' => false,
			'message' => "Password restoration link was send on ur email, folow the link to restore password.",
		];
	}

	public static function changePassword($token, $password, $rePassword)
	{
		if (!self::validatePassword($password) || !self::validatePassword($rePassword) || $password != $rePassword)
			return [
				'error' => true,
				'message' => '<p>Somthing wrong with password, dont try to cheat!</p>',				
			];

		$sql = "
			SELECT user.id FROM `user` WHERE user.confirm_hash = :token
		";
		$res = $GLOBALS['di']->get('db')->queryOne($sql, [
			':token' => $token,
		]);
		if (empty($res))
			return [
				'error' => true,
				'message' => "<p>This token allready expired or isnt valid, to get new one use form below: </p>",
			];

		$sql = "
			UPDATE `user`
			SET
				user.confirm_hash = NULL,
				user.password = :password
			WHERE user.id = {$res['id']}
		";
		$GLOBALS['di']->get('db')->execute($sql, [
			':password' => hash('whirlpool', $password),
		]);
		return [
			'error' => false,
			'message' => "<p>Password restoration complete!</p>",				
		];	
	}

	public static function checkToken($token)
	{
		$sql = "
			SELECT user.id FROM `user` WHERE user.confirm_hash = :token
		";
		$res = $GLOBALS['di']->get('db')->queryOne($sql, [
			':token' => $token,
		]);
		if (empty($res))
			return [
				'error' => true,
				'message' => "<p>This token allready expired or isnt valid, to get new one use form below: </p>",
			];
		return [
			'error' => false,
			'message' => "<p>Please enter below ur new password:</p>"
		];
	}

	private static function validatePassword($password)
	{
		if (!preg_match('/^\w{3,21}$/', $password) ||
			!preg_match('/[a-z]/', $password) ||
			!preg_match('/[A-Z]/', $password) ||
			!preg_match('/[0-9]/', $password))
			return false;
		return true;
	}

	public static function checkPassword($password)
	{
		if (isset($_SESSION['logedUser']))
		{
			$sql = "
				SELECT user.password FROM `user` WHERE user.password = :password AND user.id = {$_SESSION['logedUser']}
			";
			$res = $GLOBALS['di']->get('db')->queryOne($sql, [
				':password' => hash('whirlpool', $password),
			]);
			if ($res)
				return true;			
		}
		return false;
	}

	public static function changePasswordNoToken($oldPassword, $newPassword)
	{
		if ($oldPassword != $newPassword && !self::validatePassword($newPassword))
			return false ;
		if (isset($_SESSION['logedUser']))
		{
			$sql = "
				UPDATE `user`
				SET
					user.password = :password
				WHERE user.id = {$_SESSION['logedUser']} AND user.password = :oldPassword
			";	
			$res = $GLOBALS['di']->get('db')->execute($sql, [
				':oldPassword' => hash('whirlpool', $oldPassword),
				':password' => hash('whirlpool', $newPassword),
			]);
			if ($res)
				return true;
		}
		return false;
	}

}
