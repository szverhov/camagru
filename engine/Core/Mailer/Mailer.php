<?php

namespace Engine\Core\Mailer;


class Mailer
{
	private $_transport;
	private $_mailer;

	public function __construct()
	{
		$this->_transport =  (new \Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
			->setUsername('szcamagru@gmail.com')
			->setPassword('4509155z');
		$this->_mailer = new \Swift_Mailer($this->_transport);
	}

	public function sendMasage($to, $subject, $message)
	{
		$html = "
			<html>
			<title>Camagru</title>
			<meta charset='UTF-8'>
			<body>
				{$message}
			</body>
			</html>
		";
		$swiftMessage = (new \Swift_Message('Hello from Camagru'))
			->setContentType("text/html")
			->setFrom(['szcamagru@gmail.com' => 'szcamagru'])
			->setTo([$to => 'Camagru user'])
			->setBody($html);
		return $this->_mailer->send($swiftMessage);
	}
}