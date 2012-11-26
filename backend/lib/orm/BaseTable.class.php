<?php

require_once('lib/orm/Connection.class.php');

class BaseTable{

	private static function getTableName(){
		$str = get_called_class();
		//CamelCase to underscore;
		$str[0] = strtolower($str[0]);
	    $func = create_function('$c', 'return "_" . strtolower($c[1]);');
	    return preg_replace_callback('/([A-Z])/', $func, $str);
	}

	private static function createObjectFromQueryResult($results){
		$className = get_called_class();
		$obj = new $className();
		//TODO 
		return $obj;
	}

	public function save(){
		//TODO
		Connection::getInstance();
	}

	public static function findAll(){
		$query = "SELECT ".self::getTableName().".* FROM ".self::getTableName();
		return self::objQuery($query);
	}

	public static function find($id){
		$arr = self::findBy('id',$id);
		return $arr[0];
	}

	public static function findBy($field,$value){
		$query = "SELECT ".self::getTableName().".* FROM ".self::getTableName()." WHERE `$field` = '$value'";
		return self::objQuery($query);
	}

	public static function objQuery($query){
		$db_res = Connection::getInstance()->query($query);
		$res = array();
		foreach($db_res as $db_rec){
			$res[] = self::createObjectFromQueryResult($db_rec);
		}
		return $res;
	}
}