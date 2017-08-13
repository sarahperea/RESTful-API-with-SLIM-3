<?php

namespace App\controllers;

use App\models\UserModel;
use App\models\PetModel;
use App\core\RedBeanFactory;

class PetController
{
	private $redBeanFactory;

	public function __construct(RedBeanFactory $redBeanFactory)
	{
		$this->redBeanFactory = $redBeanFactory;
	}

	public function create($req, $res, $args)
	{
		$petModel = new PetModel($this->redBeanFactory);
		$pet = $petModel->create($user, [
			"name" => "Doggo",
			"type" => "dog"
		]);
		return $res->withJson($user, 200);
	}
}
