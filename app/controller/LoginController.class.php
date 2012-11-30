<?php

require_once('framework/Controller.class.php');
require_once('app/model/db/User.class.php');

class LoginController extends Controller{

	public function indexAction($request){
		if(Context::getInstance()->getSessionUser()->isLoggedIn()){
			$this->redirect('pages');
		}
	}

	public function loginAction($request){
		$login = User::checkPassword($request['login'],$request['password']);
		if($login !== false){
			Context::getInstance()->getSessionUser()->logIn($login);
			$this->redirect('pages');
		} else {
			$this->redirect('login');
		}
	}

	public function logoutAction($request){
		Context::getInstance()->getSessionUser()->logout();
		$this->redirect('login');
	}
}