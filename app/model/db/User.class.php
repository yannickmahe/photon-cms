<?php

require_once('framework/orm/BaseTable.class.php');
require_once('framework/Bcrypt.class.php');

class User extends BaseTable{

	public static function checkPassword($login,$password){

		$user = self::findOneBy('login',$login);
		if(!$user){
			return false;
		}

		$bcrypt = new Bcrypt(15);

		$valid = $bcrypt->verify($password, $user->password);

		return $valid;
	}

	public function isAdmin(){
		return $this->login == 'admin';
	}

	public function setPassword($password){
		$bcrypt = new Bcrypt(15);
		$this->password = $bcrypt->hash($password);
	}

}