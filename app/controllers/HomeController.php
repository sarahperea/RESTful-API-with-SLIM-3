<?php

namespace App\controllers;

use App\models\Model_User;
use App\core\RedBeanFactory;

class HomeController extends Controller
{
	private $redBeanFactory;

	public function __construct(RedBeanFactory $redBeanFactory)
	{
		$this->redBeanFactory = $redBeanFactory;
	}

	public function retrieve($req, $res, $args){
		echo ' homecontroller retrieve ';
		$userModel = new Model_User($this->redBeanFactory);
		$user = $userModel->retrieve();
		return $res->withJson($user,200);
	}

	public function create($req, $res, $args) 
	{
		echo ' homecontroller create ';
		$userModel = new Model_User($this->redBeanFactory);
		$user = $userModel->create($req->getParsedBody());
		return $res->withJson($user, 200);
	}

	public function update($req, $res, $args){
		echo ' homecontroller update ';
		$userModel = new Model_User($this->redBeanFactory);
		$user = $userModel->update($req->getParsedBody(),$req->getAttribute('id'));
		return $res->withJson($user, 200);
	}

	public function delete($req, $res, $args){
		echo ' homecontroller delete ';
		$userModel = new Model_User($this->redBeanFactory);
		$user = $userModel->delete($req->getAttribute('id'));
		return $res->withJson($user, 200);
	}
}
