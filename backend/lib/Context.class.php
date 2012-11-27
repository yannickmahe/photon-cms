<?php 

class Context{

	private static $instance;

	private function setAppRoot($directory = ''){
		$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
		if($directory != ''){
			$path_info = explode($directory, $_SERVER['REQUEST_URI']);
			$this->appRoot = $protocol.$_SERVER['HTTP_HOST'].$path_info[0].$directory;
		} else {
			$this->appRoot = $protocol.$_SERVER['HTTP_HOST'];
		}
	}

	public function getInstance(){
		if(!self::$instance){
			self::$instance = new Context();
		}
		return self::$instance;
	}

	public function getCurrentUrl(){
		$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
		return  $protocol.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	}

	public function init($directory){
		try{
			$this->setAppRoot($directory);
			$path_info = explode('index.php', $_SERVER['REQUEST_URI']);
			if(isset($path_info[1])){
				$path = $path_info[1];
			} else {
				$path = '/';
			}
			Router::dispatch($path,$_REQUEST);
		} catch(Exception $e){
			header('HTTP/1.1 500 Internal Server Error');
			echo "<h1>Error 500</h1>";
			echo "<strong>".$e->getMessage()."</strong>";
			echo "<h2>Trace:</h2>";
			echo nl2br($e->getTraceAsString());
		}
	}

}