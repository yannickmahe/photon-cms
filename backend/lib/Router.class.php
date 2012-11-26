<?php

class Router{
	
	public static function dispatch($request){

		foreach (glob("controller/*Controller.class.php") as $filename)
		{
		    include_once($filename);
		}


		$controllerName = $request['controller'];
		$actionName		= $request['action'];
		unset($request['action'],$request['controller']);

		$className = ucfirst($controllerName).'Controller';

		if(!class_exists($className)){
			throw new Exception("Controller not found : ".$className);
		}

		$controller = new $className();
		$controller->dispatch($actionName, $request);
	}

}