<?php

require_once('lib/Controller.class.php');

class DashboardController extends Controller{

	public function indexAction($request){
		$this->pageName = 't';
	}
}