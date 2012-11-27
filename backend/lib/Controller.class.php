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

	private function getCanonicalUrl($action,$request){
		return Router::genUrl($this->getName(),$action,$request);
	}

	private function getViewFile($action){
		return $action.'.html.php';
	}

	public function dispatch($action,$request){
		
		if(Context::getInstance()->getCurrentUrl() != $this->getCanonicalUrl($action,$request)){
			$this->redirect_to_url($this->getCanonicalUrl());
		}

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

	public function redirect($controller,$action = 'index',$variables = array()){
		$this->redirect_to_url(Router::genUrl($controller,$action,$variables));
	}

	public function redirect_to_url($url){
		// no redirect
		header( "Location: $url" );
	}
}