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
		if($this->id){
			$query = "UPDATE ".self::getTableName(). " SET ";
			$vars = get_object_vars($this);
			unset($vars['id']);
			$im = array();
			foreach($vars as $name => $value){
				$name = Connection::getInstance()->escapeString($name);
				$value = Connection::getInstance()->escapeString($value);
				$im[] = "$name = '$value'";
			}
			$query .= implode(', ',$im);
			$query .= " WHERE id = ".$this->id;
			Connection::getInstance()->query($query);
		} else {
			$query = "INSERT INTO ".self::getTableName()." ";
			$fields = get_object_vars($this);
			unset($fields['id']);
			$columns = array_keys($fields);
			$values = array_values($fields);
			foreach($values as $i => $value){
				$values[$i] = "'".Connection::getInstance()->escapeString($value)."'";
			}
			$query = $query ." ( ".implode(',', $columns)." ) VALUES (".implode(',', $values).")";
			$this->id = Connection::getInstance()->insert($query);
		}
		
	}

	public function delete(){
		$query = "DELETE FROM ".self::getTableName()." WHERE id = ".$this->id;
		Connection::getInstance()->query($query);
	}

	public static function findAll(){
		$query = "SELECT ".self::getTableName().".* FROM ".self::getTableName();
		return self::objQuery($query);
	}

	public static function find($id){
		$arr = self::findBy('id',$id);
		return $arr[0];
	}

	public static function findOneBy($field,$value){
		$arr = self::findBy($field,$value);
		return $arr[0];
	}

	public static function findBy($field,$value){
		$field = Connection::getInstance()->escapeString($field);
		$value = Connection::getInstance()->escapeString($value);
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