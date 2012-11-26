<?php

include_once('lib/orm/BaseTable.class.php');

class Page extends BaseTable{

	public function delete(){
		if($this->url == '/'){
			throw new Exception("Can't delete homepage !");
		}
		parent::delete();
	}
}