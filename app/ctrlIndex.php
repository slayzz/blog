<?php
require_once("lib/base.php");
require_once("lib/db.php");
class ctrlIndex extends ctrl {

	function index() {
		$this->posts = $this->db->query('SELECT * FROM post')->all();
		$this->out('posts.php');
	}

  function login() {
  	$this->out('login.php');
  }
}

 ?>
