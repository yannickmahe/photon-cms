<?php 

class Context{

	private static $instance;

	public function getInstance(){
		if(!self::$instance){
			self::$instance = new Context();
		}
		return self::$instance;
	}

}