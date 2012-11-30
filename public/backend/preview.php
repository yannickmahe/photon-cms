<?php
chdir(dirname(__FILE__).'/../../');
require_once('app/model/db/Page.class.php');
require_once('framework/Context.class.php');
require_once('framework/Controller.class.php');

session_start();
$c = new Controller();
$c->checkLogin();

$pages = Page::findBy('url',$_GET['url']);

if(count($pages) == 0){
	$pages = Page::findBy('url','/404.html');
}

$page = $pages[0];

$page->render();