<?php

namespace App\models;

class_alias('\RedBeanPHP\R','\R');

use App\core\RedBeanFactory;

class Model_User{
	
	private $redBeanFactory;

	public function __construct(RedBeanFactory $redBeanFactory)
	{
		$this->redBeanFactory = $redBeanFactory;
	}

	public function retrieve(){
		echo ' model retrieve ';
		return \R::getAll( "SELECT * FROM user ORDER BY user_id" );
	}

	public function create($parsedBody){
		echo ' model create ';
		\R::exec( "INSERT INTO user (first_name, middle_name, last_name) VALUES (:fn,:mn,:ln)",
			array(':fn' => $parsedBody['first_name'], ':mn' => $parsedBody['middle_name'], ':ln' => $parsedBody['last_name']) );
	}

	public function update($parsedBody, $id){
		echo ' model update ';
		\R::exec( "UPDATE user SET first_name = :fn, middle_name = :mn, last_name = :ln WHERE user.user_id = :id",
			array(':id' => $id, ':fn' => $parsedBody['first_name'], ':mn' => $parsedBody['middle_name'], ':ln' => $parsedBody['last_name']) );
	}

	public function delete($id){
		echo ' model delete ';
		\R::exec( "DELETE FROM user WHERE user.user_id = :id", array(':id' => $id) );
	}
}

