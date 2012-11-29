<?php

include_once('lib/orm/BaseTable.class.php');
include_once('lib/View.class.php');
include_once('model/Config.class.php');

class Page extends BaseTable{

	public function delete(){
		if($this->url == '/'){
			throw new Exception("Can't delete homepage !");
		}
		if($this->url == '/404.html'){
			throw new Exception("Can't delete 404 page");
		}
		if($this->url == '/500.html'){
			throw new Exception("Can't delete 500 page");
		}
		parent::delete();
	}

	public function render($to_file = false){
		$page_title = $this->title;
		$page_head = View::renderVariable($this->head_html);
		$page_content = View::renderVariable($this->body_html);

		Context::getInstance()->toFile = $to_file;
		Context::getInstance()->currentPageId = $this->id;

		$theme = Config::findOneBy('name','theme');
		$theme = $theme->value;
		$themeLayoutFile = 'themes/'.$theme.'/layout.html.php';
		$variables = array('page_title' 		=> $page_title,
					  	   'page_head'  		=> $page_head,
					  	   'page_content'		=> $page_content);

		$html = View::renderThemeFile($themeLayoutFile,	$variables);

		if($to_file){

		} else {
			echo $html;
		}

		unset(Context::getInstance()->toFile);
		unset(Context::getInstance()->currentPageId);
		
	}

	public function save(){
		if($this->url[0] != '/'){
			throw new Exception("URL must begin with a /");
		}
		if(substr($this->url, 0, 8) == '/backend' ){
			throw new Exception("Can't save page with url starting with /backend");
		}
		if(substr($this->url, 0, 7) == '/assets' ){
			throw new Exception("Can't save page with url starting with /assets");
		}
		parent::save();
	}
}