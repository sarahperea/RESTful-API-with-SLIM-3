<?php

namespace App\models;

use App\core\RedBeanFactory;

class Model_User{
	
	private $redBeanFactory;

	public function __construct(RedBeanFactory $redBeanFactory)
	{
		$this->redBeanFactory = $redBeanFactory;
	}

	public function index()
	{
		echo 'model_user';
	}

	public function retrieve(){
		echo 'model retrieve';
	}

	public function create(){
		echo 'model create';
	}

	public function update(){
		echo 'model update';
	}

	public function delete(){
		echo 'model delete';
	}
	
}

