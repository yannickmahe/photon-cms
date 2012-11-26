<?php

require_once('lib/Controller.class.php');

class PagesController extends Controller{

	public function listAction($request){

		$this->pageName = $request['toto'];
	}
}