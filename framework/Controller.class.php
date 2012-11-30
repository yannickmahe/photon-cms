<?php

require_once('framework/View.class.php');

class Controller{

	private function getName(){
		$className = get_class($this);
		$name = str_replace('Controller', '', $className);
		$name = lcfirst($name);
		return $name;
	}

	private function getViewsFolder(){
		return 'app/views'.DIRECTORY_SEPARATOR.$this->getName();
	}

	private function getCanonicalUrl($action,$request){
		return Router::genUrl($this->getName(),$action,$request);
	}

	private function getViewFile($action){
		return $action.'.html.php';
	}

	public function checkLogin(){
		if(!Context::getInstance()->getSessionUser()->isLoggedIn()){
			$this->redirect('login');
		}
	}

	public function dispatch($action,$request){
		$actionName = $action.'Action';	
		$this->$actionName($request);
		$this->render($action);
	}

	private function render($action){
		$contentFilePath = $this->getViewsFolder().DIRECTORY_SEPARATOR.$this->getViewFile($action);

		$variables = get_object_vars($this);
		$content = View::render($contentFilePath,$variables);

		echo View::render('app/views/layout.html.php', array('content' => $content));
	}

	public function redirect($controller,$action = 'index',$variables = array()){
		$this->redirect_to_url(Router::genUrl($controller,$action,$variables));
	}

	public function redirect_to_url($url){
		header( "Location: $url" );
	}
}