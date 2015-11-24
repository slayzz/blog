<?php
class ctrl {
	public function __construct() {
		$this->db = new db();

		if (!empty($_COOKIE['uid']) && !empty($_COOKIE['key'])){
			$this->user = $this->db->query("SELECT * FROM
				admin WHERE id = ? AND cookie = ?",
				$_COOKIE['uid'], $_COOKIE['key']);
		}else {
			$this->user = false;
			echo "no";
		}
	}
	public function out($tplname,$nested=false) {
		if (!$nested){
			$this->tpl = $tplname;
			include 'tpl/main.php';
		}else {
			include 'tpl/' . $tplname;
		}
	}
	private function userExist(){
		$url = $_SERVER['REQUEST_URI'];
		$search = '~';
		if (strstr($url,$search)){
			$url = explode('/',$url);
			foreach ($url as $value){
				if (strstr($value,$search)){
					$url = $value;
					break;
				}else {
					$url = "";
				}
			}
		}

		return $url . "/";
	}
}

class app {
	public $name_for_method;
	public function __construct($path) {

		$this->route = explode('/',$path);
		$this->route = array_shift($this->route);
		$this->run();
	}

	private function run() {
		$url = $this->route;
		echo $url;
		if (!preg_match('#^[a-zA-Z0-9.,-]*$#' , $url))
			throw new Exception('Invalid path');
		$ctrlName = 'ctrl'. ucfirst($url);
		if (file_exists('app/'. $ctrlName)) {
			$this->runController($ctrlName);
		}else {
			array_unshift($this->route,$url);
			$this->runController('ctrlIndex');
		}
	}
	private function runController($ctrlName) {
		include "app/" .$ctrlName . '.php';
		$ctrl = new $ctrlName();
			if (empty($this->route || empty($this->route[0]))){
				$ctrl->index();
			}else {
				if (empty($this->route)){
					$method = 'index';
				}else{
					$method = $this->route;
				}
				if (method_exists($ctrl, $method)){
					$ctrl->$method();
				}else{
					throw new Exception("error 404");
				}
			}
  }

}



?>
