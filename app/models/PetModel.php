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

	public function create($user, $pet_data) {
   	$pet = \R::dispense("pet")->import($pet_data, [
      	"name"
      	"type"
    	])->import([
      	"user" => $user,
      	"datetime_created" => gmdate("Y-m-d H:i:s"),
      	"datetime_modified" => gmdate("Y-m-d H:i:s"),
    	]);
	}
}
