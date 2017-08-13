<?php

namespace App\models;

class_alias('\RedBeanPHP\R','\R');

use App\core\RedBeanFactory;

class PetModel
{
	private $redBeanFactory;
	
	public function __construct(RedBeanFactory $redBeanFactory)
	{
		$this->redBeanFactory = $redBeanFactory;
	}

	public function create()
	{
		$pet = \R::dispense('pets');
		$pet->name = 'doggy';
		\R::store($pet);
		return $pet;
	}
}
