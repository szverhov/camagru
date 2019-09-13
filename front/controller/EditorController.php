<?php

namespace Front\Controller;

use Engine\AbstractController;
use Engine\DI\DI;
use Front\Model\User;

class EditorController extends AbstractController
{
	public function beforeAction()
	{
		if (!isset($_SESSION['logedUser']))
			$this->redirect('/user/sign-in', ['mainMessage' => 'Please sign in to the system!']);
	}
	
	private $_stickers = [];

	public function actionIndex()
	{

		$this->render('index', ['var' => 'Main page']);
	}

	public function actionGetStickers()
	{
		$this->getDirs('./web/files/stickers');
		foreach ($this->_stickers as $key => $value)
		{
			$this->scanDir('./web/files/stickers' . '/' . $key, $key);
		}

		exit (json_encode($this->_stickers));
	}

	private function getDirs($targetPath)
	{
		$files = scandir($targetPath);
		foreach ($files as $key => $value)
			if ($value != '.' && $value != '..' && is_dir($targetPath . '/' . $value))
				$this->_stickers[$value] = [];
	}

	private function scanDir($targetPath, $stickKey)
	{
        if(is_dir($targetPath))
        {
        	$files = glob( $targetPath . '*', GLOB_MARK );

		    foreach( $files as $file )
		    {
		        $this->scanDir($file, $stickKey);
		    }
        }
        else if (strstr($targetPath, '.png'))
        {
        	$targetPath = str_replace('./web', '', $targetPath);
        	$targetPath = str_replace('\\', '/', $targetPath);
        	$this->_stickers[$stickKey][] = implode('/', array_map('rawurlencode', explode('/', $targetPath)));
        }
    }
}
