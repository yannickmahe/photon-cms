<?php

include_once('model/LayoutItem.class.php');

function include_theme_css(){
	//TODO
}

function include_theme_partial($name){
	$theme = Config::findOneBy('name','theme');
	$theme = $theme->value;

	$itemsArr = LayoutItem::objQuery("SELECT layout_item.* FROM layout_item WHERE theme = '$theme' AND name = '$name'");
	if(count($itemsArr) > 0){
		$item = $itemsArr[0];
		echo View::renderVariable($item->html);
	} else {
		$filePath = 'themes'.DIRECTORY_SEPARATOR.$theme.DIRECTORY_SEPARATOR.'_'.$name.'.html.php';
		if(!file_exists($filePath)){
			throw new Exception("Can't find required partial. Expected path: ".$filePath);
		}
		echo View::renderThemeFile($filePath);
	}
}

function include_theme_js(){
	//TODO
}

function link_to_page($id, $text, $classIfCurrent){
	//TODO
}