<?php

namespace Engine\Core\Mailer;

class Mailer
{
	public function sendMasage($to, $subject, $message)
	{
		$subject = "Camagru site";
		$mes = "
			<html>
			<head>
				<title>Camagru</title>
			</head>
			<body>
				{$message}
			</body>
			</html>
		";
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

		$success = mail($to, $subject, $mes, $headers);
	}
}