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

	private static function createObjectFromQueryResult($row_arr){
		$className = get_called_class();
		$obj = new $className();

		foreach($row_arr as $column => $value){
			$obj->$column = $value;
		}

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
		while($row_arr = $db_res->fetchArray(SQLITE3_ASSOC)){
			$res[] = self::createObjectFromQueryResult($row_arr);
		}
		return $res;
	}
}