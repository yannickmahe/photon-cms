<?php

require_once('lib/Controller.class.php');
require_once('model/Page.class.php');

class PagesController extends Controller{

	public function indexAction($request){
		$this->pages = Page::findAll();
	}

	public function editAction($request){

		if($request['page']){
			$page = new Page();

			$page->save();
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