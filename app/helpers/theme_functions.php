<?php

require_once('framework/Context.class.php');
require_once('app/model/db/LayoutItem.class.php');
require_once('app/model/db/Page.class.php');


function include_theme_partial($name){
	$theme = Config::findOneBy('name','theme');
	$theme = $theme->value;

	$itemsArr = LayoutItem::objQuery("SELECT layout_item.* FROM layout_item WHERE theme = '$theme' AND name = '$name'");
	if(count($itemsArr) > 0){
		$item = $itemsArr[0];
		echo View::renderVariable($item->html);
	} else {
		$filePath = 'public'.DIRECTORY_SEPARATOR.'themes'.DIRECTORY_SEPARATOR.$theme.DIRECTORY_SEPARATOR.'_'.$name.'.html.php';
		if(!file_exists($filePath)){
			throw new Exception("Can't find required partial. Expected path: ".$filePath);
		}
		echo View::renderThemeFile($filePath);
	}
}

function link_to_page($id, $text, $classIfCurrent){
	
	$page = Page::find($id);
	$currentPageId = Context::getInstance()->currentPageId;

	if(Context::getInstance()->toFile){
		$url = $page->url;
	} else {
		$url = 'http://localhost/photon-cms/public/backend/preview.php?url='.$page->url; //TODO
	}

	$ret =  '<a href="'.$url.'" '; 
	if($page->id == $currentPageId){
		$ret .= ' class="'.$classIfCurrent.'" ';
	}
	$ret .= '>';
	$ret .= $text;
	$ret .= '</a>';
	echo $ret;
}

function include_theme_css(){
	$theme = Config::findOneBy('name','theme');
	$theme = $theme->value;
	if(Context::getInstance()->toFile){
		//Minimize CSS
		//Include it
	} else {
		$base = 'http://localhost/photon-cms/backend/'.$theme.'/css/';
		//TODO
	}
}

function include_theme_js(){
	$theme = Config::findOneBy('name','theme');
	$theme = $theme->value;
	if(Context::getInstance()->toFile){
		//Minimize JS
		//Include it
	} else {
		$base = 'http://localhost/photon-cms/backend/'.$theme.'/js/';
		//TODO
	}
}
