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
		$user = \R::dispense("user")->import($parsedBody, [
			 "firstname",
			 "middlename",
			 "lastname"
		]);
		\R::store($user);
		return $user;
	}

	public function update($parsedBody, $id)
	{
		$user = \R::load('users',$id)->import($parsedBody, [
			 "firstname",
			 "middlename",
			 "lastname"
		]);
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

