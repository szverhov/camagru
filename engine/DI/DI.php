<?php

namespace Engine\DI;

class DI
{
	private $_container = [];

	public function set($key, $value)
	{
		$this->_container[$key] = $value;
		return ($this);
	}

	public function get($key)
	{
		return (isset($this->_container[$key]) ? $this->_container[$key] : null);
	}
}
