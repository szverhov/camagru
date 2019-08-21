<?php

namespace Engine\Service\Mailer;

use Engine\Service\AbstractProvider;
use Engine\Core\Mailer\Mailer;

class Provider extends AbstractProvider
{
	public $_serviceName = 'mailer';

	public function init()
	{
		$mailer = new Mailer();
		$this->_di->set($this->_serviceName, $mailer);
	}
}
