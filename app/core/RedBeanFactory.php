<?php

namespace App\core;

class_alias('\RedBeanPHP\R','\R');

class RedBeanFactory
{
	private $config;

	public function __construct($config)
	{
		$this->config = $config;

		\R::setup( "mysql:host=".$config['host'].";dbname=".$config['dbname'],$config['user'], $config['pw'] );
	}
}
