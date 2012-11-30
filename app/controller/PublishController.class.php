<?php

require_once('framework/Controller.class.php');

class PublishController extends Controller{

	public function indexAction($request){
		$this->checkLogin();
		
	}
}