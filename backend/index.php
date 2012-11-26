<?php

include_once('lib/Router.class.php');

try{
	Router::dispatch($_REQUEST);
} catch(Exception $e){
	echo "<h1>Error</h1>";
	echo $e->getMessage();
	echo "<h2>Trace:</h2><br />";
	echo nl2br($e->getTraceAsString());
}

