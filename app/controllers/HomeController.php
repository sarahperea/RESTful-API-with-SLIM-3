<?php

namespace App\controllers;

use App\models\UserModel;
use App\models\PetModel;
use App\core\RedBeanFactory;

class HomeController extends Controller
{
	private $redBeanFactory;

	public function __construct(RedBeanFactory $redBeanFactory)
	{
		$this->redBeanFactory = $redBeanFactory;
	}

	public function retrieve($req, $res, $args)
	{
		$userModel = new UserModel($this->redBeanFactory);
		$user = $userModel->retrieve($req->getAttribute('id'));
		return $res->withJson($user, 200);
	}

	public function retrieveAll($req, $res, $args)
	{
		$userModel = new UserModel($this->redBeanFactory);
		$user = $userModel->retrieveAll();
		return $res->withJson($user,200);
	}

	public function create($req, $res, $args) 
	{
		$userModel = new UserModel($this->redBeanFactory);
		$user = $userModel->create($req->getParsedBody());
		return $res->withJson($user, 200);
	}

	public function update($req, $res, $args)
	{
		$userModel = new UserModel($this->redBeanFactory);
		$user = $userModel->update($req->getParsedBody(),$req->getAttribute('id'));
		return $res->withJson($user, 200);
	}

	public function delete($req, $res, $args)
	{
		$userModel = new UserModel($this->redBeanFactory);
		$user = $userModel->delete($req->getAttribute('id'));
		return $res->withJson($user, 200);
	}

	public function addPet($req, $res, $args)
	{
		$petModel = new PetModel($this->redBeanFactory);
		$pet = $petModel->create();
		$userModel = new UserModel($this->redBeanFactory);
		$user = $userModel->addPet($req->getAttribute('id'), $pet);
		return $res->withJson($user, 200);
	}

	public function retrievePets($req, $res, $args)
	{
		$userModel = new UserModel($this->redBeanFactory);
		$user = $userModel->retrievePets($req->getAttribute('id'), $pet);
		return $res->withJson($user, 200);

	}

}
