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
		if(is_file('db/photon.db')){
			$this->sqlite3 = new SQLite3('db/photon.db');
		} else {
			$this->sqlite3 = new SQLite3('db/photon.db');
			$init = file_get_contents('db/init.sql');
			$this->sqlite3->exec($init);
		}
		
	}

	public function query($query){
		$ret = $this->sqlite3->query($query);
		if($ret === false){
			throw new Exception($this->sqlite3->lastErrorMsg());
		} 
		return $ret;
	}

	public function insert($query){
		if($this->sqlite3->exec($query)){
			return $this->sqlite3->lastInsertRowID();
		} else {
			throw new Exception($this->sqlite3->lastErrorMsg());
		}

	}

	public function escapeString($string){
		return $this->sqlite3->escapeString($string);
	}
}