<?php

require_once('lib/Controller.class.php');
require_once('model/LayoutItem.class.php');

class LayoutController extends Controller{

	public function indexAction($request){
		$this->checkLogin();
		LayoutItem::initLayoutItems();

		$theme = Config::findOneBy('name','theme');
		$theme = $theme->value;

		$this->itemsArr = LayoutItem::findBy('theme',$theme);
	}

	public function updateAction($request){
		$this->checkLogin();
		$itemsSubmit = $request['items'];
		var_dump($itemsSubmit);

		$theme = Config::findOneBy('name','theme');
		$theme = $theme->value;
		$itemsObjArr = LayoutItem::findBy('theme',$theme);

		foreach($itemsObjArr as $itemObj){
			$itemObj->html = $itemsSubmit[$itemObj->id];
			$itemObj->save();
		}
		$this->redirect('layout');
	}
}