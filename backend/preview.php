<?php
include_once('model/Page.class.php');

$pages = Page::findBy('url',$_GET['url']);

if(count($pages) == 0){
	$pages = Page::findBy('url','/404.html');
}

$page = $pages[0];

echo $page->html;