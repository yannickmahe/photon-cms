<?php

require_once('lib/Controller.class.php');

class PagesController extends Controller{

	public function indexAction($request){
		$this->pageName = 't';
	}
}