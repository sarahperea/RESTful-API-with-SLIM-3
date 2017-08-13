<?php

namespace App\models;


class Model_User{
	
	public $name;

	public function __construct($config)
	{
	}

	public function index()
	{
		echo 'model_user';
	}
}

