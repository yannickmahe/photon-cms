<?php

require_once('lib/Controller.class.php');
require_once('model/Page.class.php');

class PagesController extends Controller{

	public function indexAction($request){
		$this->pages = Page::findAll();
	}

	public function editAction($request){
		if($request['page']){
			$submit = $request['page'];
			if($submit['id'] != ''){
				$id = $submit['id'];
				$page = Page::find($id);
			} else {
				$page = new Page();
			}
			$page->title = $submit['title'];
			$page->url = $submit['url'];
			$page->html = $submit['html'];
			$page->save();
			$this->redirect('pages');
		}

		if(!$request['id']){
			$this->title = "New page";
			$this->page = new Page();
		} else {
			$this->title = "Edit page";
			$this->page = Page::find($request['id']);
		}
	}

	public function deleteAction($request){
		$page = Page::find($request['id']);
		if($page){
			$page->delete();
		}
		$this->redirect('pages');
	}


}