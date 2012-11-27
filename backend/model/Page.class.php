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
}