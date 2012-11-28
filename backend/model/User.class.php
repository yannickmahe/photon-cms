<?php

include_once('lib/orm/BaseTable.class.php');
include_once('lib/Bcrypt.class.php');

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

}