<?php

require_once('lib/Controller.class.php');

class LayoutController extends Controller{

	public function indexAction($request){
		$this->checkLogin();

	}
}