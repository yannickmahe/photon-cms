<?php

class View{

	public static function render($filePath, $variables){
		if($variables !== null){
			extract($variables);	
		}		

	    // render
	    ob_start();
	    ob_implicit_flush(0);

	    try
	    {
	      require_once(dirname(__FILE__).'/helpers/view_functions.php');
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