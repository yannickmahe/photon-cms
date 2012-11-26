<?php 

class Context{

	private static $instance;

	public function getInstance(){
		if(!self::$instance){
			self::$instance = new Context();
		}
		return self::$instance;
	}

	public function init(){
		try{
			Router::dispatch($_REQUEST);
		} catch(Exception $e){
			header('HTTP/1.1 500 Internal Server Error');
			echo "<h1>Error 500</h1>";
			echo "<strong>".$e->getMessage()."</strong>";
			echo "<h2>Trace:</h2>";
			echo nl2br($e->getTraceAsString());
		}
	}

}