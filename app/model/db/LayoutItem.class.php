<?php

require_once('framework/orm/BaseTable.class.php');
require_once('app/model/db/Config.class.php');

class LayoutItem extends BaseTable{

	public static function initLayoutItems(){

		$theme = Config::findOneBy('name','theme');
		$theme = $theme->value;

		$requiredLayoutItems =	self::getRequiredItemNames($theme);

		foreach($requiredLayoutItems as $item){
			$itemsArr = self::objQuery("SELECT layout_item.* FROM layout_item WHERE theme = '$theme' AND name = '$item'");
			if(count($itemsArr) > 0){
				//Item already exists
			} else {
				$itemObj = new LayoutItem();
				$itemObj->name = $item;
				$itemObj->theme = $theme;
				$itemObj->html = self::getDefaultValue($theme,$item);
				$itemObj->save();
			}
		}

	}

	public static function getDefaultValue($theme, $item){
		return file_get_contents("public/themes/$theme/_$item.html.php");
	}

	public static function getRequiredItemNames($theme){
		if(!is_dir('themes')){
			throw new Exception("Theme doesn't exist: $theme");
		}
		$ret = array();
		$itemsFiles = glob("themes/$theme/_*.html.php");;
		foreach($itemsFiles as $itemFile){
			$itemFile = str_replace("themes/$theme/_", '', $itemFile);
			$itemFile = str_replace(".html.php", '', $itemFile);
			$ret[] = $itemFile;
		}
		return $ret;
	}

}