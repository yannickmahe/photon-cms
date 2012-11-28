<?php

require_once('lib/Controller.class.php');

class PublishController extends Controller{

	public function indexAction($request){
		$this->checkLogin();
		
	}
}