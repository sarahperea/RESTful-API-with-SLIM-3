<?php

class HomeController extends Controller
{

	public function __construct()
	{

	}

	public function index($name='')
	{		
		$this->model('Model_User');

	}
}
