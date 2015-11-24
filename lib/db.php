<?php
class db {
public function __construct() {
	$this->mysqli = new mysqli("localhost","root", "236801", "blog");
	}

	public function query($sql) {

		$args = func_get_args();

		$sql = array_shift($args);
		$link = $this->mysqli;
		$args = array_map(function($param) use ($link) {
			return $link->escape_string($param);
		},$args);

		$sql = str_replace(array('%','?'), array('%%','%s'),$sql);

		array_unshift($args, $sql);
		$sql = call_user_func_array('sprintf', $args);

		$this->last = $this->mysqli->query($sql);
		if ($this->last === false) throw new Exception('Database error: '.
			$this->mysqli->error);

		return $this;
	}


	public function assoc() {
		return $this->last->fetch_assoc();

	}

	public function all() {
		$result = array();
		while ($row = $this->last->fetch_assoc()) $result[] = $row;
		return $result;
	}
}
?>

