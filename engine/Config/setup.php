<?php
	$config = require_once './database.php';
	$conn = mysqli_connect($config['host'], $config['username'], $config['password']);
	$conn->query ("CREATE DATABASE {$config['dbname']}");
	$conn->select_db($config['dbname']);
	$templine = '';
	$lines = file('./camagru_db.sql');
	foreach ($lines as $line)
	{
		if (substr($line, 0, 2) == '--' || $line == '')
		    continue;
		$templine .= $line;
		if (substr(trim($line), -1, 1) == ';')
		{
		    if (!$stmt = $conn->query(str_replace(';', '', $templine)))
		    {
		    	print_r(str_replace(';', '', $templine));
		    	continue;
		    }
		    $templine = '';
		}
	}
	echo "Tables imported successfully";