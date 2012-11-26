<?php

class View{

	public static function renderView($filePath, $variables){
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