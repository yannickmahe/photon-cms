<?php

require_once('lib/View.class.php');

class Controller{

	private function getName(){
		$className = get_class($this);
		$name = str_replace('Controller', '', $className);
		$name = lcfirst($name);
		return $name;
	}

	private function getViewsFolder(){
		return 'views'.DIRECTORY_SEPARATOR.$this->getName();
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
		$content = View::render($contentFilePath,$variables);

		echo View::render('views/layout.html.php', array('content' => $content));
	}
}