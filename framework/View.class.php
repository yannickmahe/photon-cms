<?php

class View{

	public static function render($filePath, $variables = null){
		if($variables !== null){
			extract($variables);	
		}		

	    // render
	    ob_start();
	    ob_implicit_flush(0);

	    try
	    {
	      require_once('framework/helpers/view_functions.php');
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

	public function renderThemeFile($filePath, $variables = null){
		if($variables !== null){
			extract($variables);	
		}		

	    // render
	    ob_start();
	    ob_implicit_flush(0);

	    try
	    {
	      require_once('app/helpers/theme_functions.php');
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

	public static function renderVariable($variable, $variables = null){
		if($variables !== null){
			extract($variables);	
		}		
		require_once('app/helpers/theme_functions.php');

	    // render
	    ob_start();
	    ob_implicit_flush(0);

	    try{
	    	eval('?>'.$variable.'<?php ');	
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