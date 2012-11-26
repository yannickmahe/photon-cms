<?php

require_once('lib/Controller.class.php');

class PagesController extends Controller{

	public function listAction($request){

		return array('pageName'=>$request['toto']);
	}
}