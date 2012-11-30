<?php

require_once('framework/Context.class.php');

class Router{
	
	public static function dispatch($path,$request){

		$info = explode('/', $path);
		if($info[0] == ''){
			array_shift($info);
		}

		if(isset($info[0])){
			$controllerName = $info[0];
			array_shift($info);
			if(isset($info[0])){
				$actionName = $info[0];
				array_shift($info);
			}
		}

		for($i = 0; $i < count($info); $i+=2){
			if(isset($info[$i+1])){
				$request[$info[$i]] = $info[$i+1];
			} else {
				$request[$info[$i]] = '';
			}
		}

		if(!$actionName){
			$actionName = 'index';
		}
		if(!$controllerName){
			$controllerName = 'pages';
		}

		$context = Context::getInstance();
		$context->action = $actionName;
		$context->controller = $controllerName;

		unset($request['action'],$request['controller']);

		$className = ucfirst($controllerName).'Controller';
		include_once("app/controller/$className.class.php");
		if(!class_exists($className)){
			throw new Exception("Controller not found : ".$className);
		}
		
		$controller = new $className();
		$controller->dispatch($actionName, $request);
	}

	public static function genUrl($controller, $action = 'index', $variables = array()){
		if(count($variables) == 0 && $action == 'index'){
			$action = '';
		}
		$url = Context::getInstance()->appRoot."/index.php/$controller/$action";
		foreach($variables as $name => $value){
			$url .= "/$name/$value";
		}
		return $url;
	}
}