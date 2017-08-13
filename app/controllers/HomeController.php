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

	public function index()
	{		
		echo Model_User::index();
	}

	/*
	public function create($req, $res, $args) 
	{
		$userModel = new UserModel($this->redbeanFactory);

		$user = $userModel->create($req->getParsedBody());

		return $res->withJson($user, 200);
	}
	*/
}
