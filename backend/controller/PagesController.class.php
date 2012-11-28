<?php

require_once('lib/Controller.class.php');
require_once('model/Page.class.php');

class PagesController extends Controller{

	public function indexAction($request){
		$this->checkLogin();
		$this->pages = Page::findAll();
	}

	public function editAction($request){
		$this->checkLogin();
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
			$page->body_html = $submit['body_html'];
			$page->head_html = $submit['head_html'];
			$page->save();
			$this->redirect('pages');
		}

		if(!$request['id']){
			$this->title = "New page";
			$this->page = new Page();
			$this->page->head_html = '<meta name="robots" content="index, follow, noarchive">';
		} else {
			$this->title = "Edit page";
			$this->page = Page::find($request['id']);
		}
	}

	public function deleteAction($request){
		$this->checkLogin();
		$page = Page::find($request['id']);
		if($page){
			$page->delete();
		}
		$this->redirect('pages');
	}


}