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
			//init database
			//TODO: put the init schema in config
			$this->sqlite3->exec('CREATE TABLE page (id INTEGER PRIMARY KEY, title STRING, url STRING, html TEXT);');
			$this->sqlite3->exec("INSERT INTO page (title, url, html) VALUES ('Home','/','Homepage');");
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