<?php

require_once('lib/Controller.class.php');

class PagesController extends Controller{

	public function indexAction($request){
		
	}

	public function editAction($request){

		if($request['page']){

		}

		if($request['id']){
			$id = $request['id'];
		}

		if(!$id){
			
			$this->title = "New page";
		} else {
			$this->title = "Edit page";
		}
	}


}