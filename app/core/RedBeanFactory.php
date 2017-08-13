<?php

namespace App\core;

class_alias('\RedBeanPHP\R','\R');

class RedBeanFactory
{
	private $config;

	public function __construct($config)
	{
		$this->config = $config;
		\R::setup( 'mysql:host=localhost;dbname=db_indigo','root', 'luckystar' );
	}
}
