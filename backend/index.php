<?php

include_once('lib/Router.class.php');

try{
	Router::dispatch($_REQUEST);
} catch(Exception $e){
	echo "<h1>Error</h1>";
	echo $e->getTraceAsString();
}

