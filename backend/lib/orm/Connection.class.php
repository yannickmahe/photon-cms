<?php 

class Connection{
	
	private static $instance;
	private static $sqlite3;

	public function getInstance(){
		if(!self::$instance){
			self::$instance = new Connection();
		}
		return self::$instance;
	}

	public function __construct(){
		if(is_file('db/ftl.db')){
			$this->sqlite3 = new SQLite3('db/ftl.db');
		} else {
			$this->sqlite3 = new SQLite3('db/ftl.db');
			$init = file_get_contents('db/init.sql');
			$this->sqlite3->exec($init);
		}
		
	}

	public function query($query){
		return $this->sqlite3->query($query);
	}

	public function insert($query){
		$this->sqlite3->exec($query);
		return $this->sqlite3->lastInsertRowID();
	}

	public function escapeString($string){
		return $this->sqlite3->escapeString($string);
	}
}