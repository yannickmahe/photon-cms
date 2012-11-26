<?php

/**
 * All the helper functions usable in a view
 * 
 */
function url_for($controller,$action = 'index',$variables = array()){
	$url = "index.php?controller=$controller&action=$action";
	foreach($variables as $name => $value){
		$url .= "&$name=$value";
	}
	return $url;
}

function include_partial($name,$variables){
	$filePath = 'views'.DIRECTORY_SEPARATOR.'partials'.DIRECTORY_SEPARATOR.'_'.$name.'.html.php';
	if(!file_exists($filePath)){
		throw new Exception("Can't find required partial. Expected path: ".$filePath);
	}
	echo View::render($filePath, $variables);
}

function is_current($controller, $action = null){
	if($action === null){
		return Context::getInstance()->controller == $controller;
	}
	
	return Context::getInstance()->action == $action && Context::getInstance()->controller == $controller;
}
