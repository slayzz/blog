<?php
class ctrlIndex extends ctrl {

	function index() {
		$this->posts = $this->db->query('SELECT * FROM post')->all();
		$this->out('posts.php');
	}

  function login() {

		if (!empty($_POST)) {
			$user = $this->db->query("SELECT * FROM admin WHERE
				email = ? AND	pass = ?",
				$_POST['mail'] ,md5($_POST['pass']))->assoc();
				?><h1><?php print_r($user);?> </h1>
		<?php if ($user) {
					$key = md5(microtime(). rand(0,10000));
					setcookie('uid', $user['id'], time() + 86400*30, '/');
					setcookie('key', md5($key), time() + 86400*30, '/');
					$this->db->query("UPDATE admin SET cookie = ? WHERE
						id = ?",$key,$user['id']);
					 header("Location: /~slayzz/");
				}else {
					$this->error = "Неправильный email или пароль";
				}

		}

  	$this->out('login.php');
  }
}

 ?>
