<?php

require_once('lib/Controller.class.php');
require_once('model/Config.class.php');

class ThemesController extends Controller{

	private function getAvailableThemes(){
		$ret = array();
		$h = opendir('themes');
		while($dir = readdir($h)){
			if($dir != '.' && $dir != '..'){
				if(is_file('themes'.DIRECTORY_SEPARATOR.$dir.DIRECTORY_SEPARATOR.'layout.html.php')){
					$ret[$dir] = true;
				} else {
					$ret[$dir] = false;
				}
			}
		}
		return $ret;
	}

	public function updateAction($request){
		$newTheme = $request['theme'];
		if(in_array($newTheme, $this->getAvailableThemes())){
			$config = Config::findBy('name','theme');
			$config->value = $newTheme;
			$config->save;
		} else {
			throw new Exception("Theme doesn't exist: ".$newTheme);
		}
		$this->redirect('themes');
	}

	public function indexAction($request){
		$this->currentTheme = Config::findOneBy('name','theme')->value;
		$this->themes = $this->getAvailableThemes();
	}
}