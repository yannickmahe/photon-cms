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

function current_page($id, $html){
	$page = Page::find($id);
	$currentPageId = Context::getInstance()->currentPageId;
	if($page->id == $currentPageId){
		echo $html;
	}
}

function page_url($id){
	
	$page = Page::find($id);

	if(Context::getInstance()->toFile){
		echo $page->url;
	} else {
		echo 'http://localhost/photon-cms/public/backend/preview.php?url='.$page->url; //TODO
	}
}

function include_theme_css(){
	$theme = Config::findOneBy('name','theme');
	$theme = $theme->value;
	if(Context::getInstance()->toFile){
		//Find Minimized CSS
		//Include it
	} else {
		$files = glob('public/themes/'.$theme.'/css/*.css');
		foreach($files as $file){
			echo '<link href="http://localhost/photon-cms/'.$file.'" rel="stylesheet" />';
		}
	}
}

function include_theme_js(){
	$theme = Config::findOneBy('name','theme');
	$theme = $theme->value;
	if(Context::getInstance()->toFile){
		//Find Minimized JS
		//Include it
	} else {
		$files = glob('public/themes/'.$theme.'/js/*.js');
		foreach($files as $file){
			echo '<script src="http://localhost/photon-cms/'.$file.'"></script>';
		}
	}
}
