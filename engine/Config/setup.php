<?php
	$config = require_once './database.php';
	print_r($config);
	exec("mysql -u {$config['username']} {$config['dbname']} < ./camagru_db.sql");