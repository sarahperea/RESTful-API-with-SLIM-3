<?php

namespace App\controllers;

use App\models\Model_User;

class HomeController extends Controller
{
	public function index()
	{		
		echo Model_User::index();
	}
}
