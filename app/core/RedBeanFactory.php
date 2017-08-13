<?php

namespace App\core;

class RedBeanFactory
{
	private $config;

	public function __construct($config)
	{
		$this->config = $config;
	}
}
