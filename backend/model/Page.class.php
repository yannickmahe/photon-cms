<?php

include_once('lib/orm/BaseTable.class.php');

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
		//TODO
		//Get themes
		//Load functions
		if($to_file){

		} else {
			echo $this->html;	
		}
		
	}

	public function save(){
		if($this->url[0] != '/'){
			throw new Exception("URL must begin with a /");
		}
		if(substr($this->url, 0, 8) == '/backend' ){
			throw new Exception("Can't save page with url starting with /backend");
		}
		parent::save();
	}
}