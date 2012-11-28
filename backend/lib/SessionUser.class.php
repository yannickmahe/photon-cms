<?php

class SessionUser{

	public function set($name,$value){
		$_SESSION[$name] = $value;
	}

	public function get($name){
		if($this->has($name)){
			return $_SESSION[$name];
		} else {
			return null;
		}
	}

	public function delete($name){
		unset($_SESSION[$name]);
	}

	public function has($name){
		return isset($_SESSION[$name]);
	}

	public function logIn($userObject){
		$this->set('user_logged_in', true);
		$this->set('user_object', $userObject);
	}

	public function isLoggedIn(){
		if($this->get('user_logged_in') !== null){
			return $this->get('user_logged_in');
		} else {
			return false;
		}
	}

	public function logout(){
		$this->delete('user_logged_in');
		$this->delete('user_object');
	}

	public function getUserObject(){
		if($this->isLoggedIn()){
			return $this->get('user_object');
		} else {
			return false;
		}
	}

}