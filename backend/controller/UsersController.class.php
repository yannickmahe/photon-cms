<?php

require_once('lib/Controller.class.php');

class UsersController extends Controller{

	public function indexAction($request){
		$this->checkLogin();
		$this->users = User::findAll();
	}

	public function deleteAction($request){
		//TODO
	}

	public function editAction($request){
		//TODO
	}
}