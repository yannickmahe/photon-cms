<?php 

class FrontController{

	public static function dispatch($request){
		
		$controller = Router::getControllerInstance($request);

		return $controller->dispatch($request);

	}

}