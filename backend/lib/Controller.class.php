<?php

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
		$this->render($action,$variables);
	}

	private function render($action, $variables){
		
		$contentFilePath = $this->getViewsFolder().DIRECTORY_SEPARATOR.$this->getViewFile($action);

		$content = $this->renderView($contentFilePath,$variables);

		echo $this->renderView('views/layout.html.php',array('content' => $content));
	}

	private function renderView($filePath, $variables){
		extract($variables);

	    // render
	    ob_start();
	    ob_implicit_flush(0);

	    try
	    {
	      require($filePath);
	    }
	    catch (Exception $e)
	    {
	      // need to end output buffering before throwing the exception #7596
	      ob_end_clean();
	      throw $e;
	    }

	    return ob_get_clean();
	}

}