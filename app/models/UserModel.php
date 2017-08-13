<?php

namespace App\models;

class_alias('\RedBeanPHP\R','\R');

use App\models\PetModel;
use App\core\RedBeanFactory;

class UserModel{
	
	private $redBeanFactory;

	public function __construct(RedBeanFactory $redBeanFactory)
	{
		$this->redBeanFactory = $redBeanFactory;
	}

	public function retrieve($id)
	{
		return \R::load('users',$id);
	}

	public function retrieveAll()
	{
		return \R::find('users');
	}

	public function create($parsedBody)
	{
		$user = \R::dispense([
			'_type' => 'users',
			'firstname' => $parsedBody['first_name'],
			'middlename' => $parsedBody['middle_name'],
			'lastname' => $parsedBody['last_name'],
		]);
		\R::store($user);
		return $user;
	}

	public function update($parsedBody, $id)
	{
		$user = \R::load('users',$id);
		$user->firstname = $parsedBody['first_name'];
		$user->middlename = $parsedBody['middle_name'];
		$user->lastname = $parsedBody['last_name'];
		\R::store($user);
		return $user;
	}

	public function delete($id)
	{
		$user = \R::load('users',$id);
		\R::trash( $user);
	}

	public function addPet($id, $pet)
	{
		$user = \R::load('users',$id);
		$user->ownPetsList[] = $pet;
    	\R::store( $user );	
		return $user;			
	}

	public function retrievePets($id)
	{
		$user = \R::load('users',$id);
		return $user->ownPetsList;		

	}
}

