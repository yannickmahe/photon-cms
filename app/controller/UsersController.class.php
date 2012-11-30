<?php

require_once('framework/Controller.class.php');
require_once('app/model/db/User.class.php');

class UsersController extends Controller{

	public function indexAction($request){
		$this->checkLogin();
		$this->users = User::findAll();
	}

	public function deleteAction($request){
		$this->checkLogin();
		$user = User::find($request['id']);
		if($user){
			$user->delete();
		}
		$this->redirect('users');
	}

	public function editAction($request){
		$this->checkLogin();
		if(isset($request['user'])){
			$submit = $request['user'];
			if($submit['id'] != ''){
				$id = $submit['id'];
				$user = User::find($id);
			} else {
				$user = new User();
			}
			if($submit['password'] != $submit['password_confirmation']){
				throw new Exception("Password and confirmation are different");
			}
			$user->login = $submit['login'];
			$user->setPassword($submit['password']);
			$user->save();
			$this->redirect('users');
		}

		if(!$request['id']){
			$this->title = "New user";
			$this->user = new User();
		} else {
			$this->title = "Edit user";
			$this->user = User::find($request['id']);
		}
	}
}