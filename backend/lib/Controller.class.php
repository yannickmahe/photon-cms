<?php

require_once('lib/View.class.php');

class Controller{

	private function getViewsFolder(){
		$className = get_class($this);
		$name = str_replace('Controller', '', $className);
		$name = lcfirst($name);
		return 'views'.DIRECTORY_SEPARATOR.$name;
	}

	private function getViewFile($action){
		return $action.'.html.php';
	}

	public function dispatch($action,$request){
		$actionName = $action.'Action';
		$variables = $this->$actionName($request);
		$this->render($action);
	}

	private function render($action){
		$contentFilePath = $this->getViewsFolder().DIRECTORY_SEPARATOR.$this->getViewFile($action);

		$variables = get_object_vars($this);
		$content = View::renderView($contentFilePath,$variables);

		echo View::renderView('views/layout.html.php',array('content' => $content));
	}
}