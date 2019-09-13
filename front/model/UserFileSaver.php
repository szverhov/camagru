<?php

namespace Front\Model;

class UserFileSaver
{
	public static $MAX_IMG_SIZE = 5242880;

	public static function saveTmpEditorUserImage($files)
	{
		$res = '';
		if (isset($_SESSION['logedUser'], $files['AjaxFile']))
		{
			if (!file_exists("./web/files/userFiles"))
				mkdir("./web/files/userFiles");
			if (!file_exists("./web/files/userFiles/{$_SESSION['logedUser']}"))
				mkdir("./web/files/userFiles/{$_SESSION['logedUser']}");
			if (!file_exists("./web/files/userFiles/{$_SESSION['logedUser']}/editorUserImage"))
				mkdir("./web/files/userFiles/{$_SESSION['logedUser']}/editorUserImage");
			$res = self::saveImg($files['AjaxFile'], "./web/files/userFiles/{$_SESSION['logedUser']}/editorUserImage/");
		}
		return $res;
	}

	public static function saveUserGalleryImageFromBase64($base64ImgString)
	{
		$res = '';
		if (isset($_SESSION['logedUser']))
		{
	    	$base64Img = base64_decode($base64ImgString);
	    	$img = imageCreateFromString($base64Img);
			if (!$img)
			  die('Base64 value is not a valid image');
			if (!file_exists("./web/files/userFiles"))
				mkdir("./web/files/userFiles");
			if (!file_exists("./web/files/userFiles/{$_SESSION['logedUser']}"))
				mkdir("./web/files/userFiles/{$_SESSION['logedUser']}");
	    	if (!file_exists("./web/files/userFiles/{$_SESSION['logedUser']}/userPhotos/"))
	    		mkdir("./web/files/userFiles/{$_SESSION['logedUser']}/userPhotos");

	    	$newImgName = hash('whirlpool', time() . $_SESSION['logedUser']) . '.png';
	    	$newImg = "./web/files/userFiles/{$_SESSION['logedUser']}/userPhotos/" . $newImgName;
	    	if (!imagepng($img, $newImg, 0))
	    		die('Img not saved');
	    	$res = $newImgName;
    	}
    	return $res;
	}


	private static function saveImg($imgFile, $targetDir)
	{
		$res = '';
		if (isset($imgFile['type'], $imgFile['size'], $imgFile['name'], $imgFile['tmp_name']))
		{
			if ($imgFile['type'] != "image/jpeg" && $imgFile['type'] != "image/png" || $imgFile['size'] > self::$MAX_IMG_SIZE)
				return $res;
			$info = pathinfo($imgFile['name']);
			$ext = $info['extension'];
			$newFileName = hash('whirlpool', $imgFile['name'] . time()) . '.' . $ext;
			$target = $targetDir . $newFileName;
			if (move_uploaded_file($imgFile['tmp_name'], $target))
				$res = str_replace('./web', '', $target);
		}
		return $res;
	}
}