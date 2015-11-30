<?php

class ctrlIndex extends ctrl
{
    public $var = 0;

    function index()
    {
        $this->posts = $this->db->query('SELECT * FROM post')->all();
        $this->out('posts.php');
    }

    function login()
    {

        if (!empty($_POST)) {
            $user = $this->db->query("SELECT * FROM admin WHERE
				email = ? AND	pass = ?", $_POST['mail'], md5($_POST['pass']))->assoc();
            ?><h1><?php print_r($user); ?> </h1>
            <?php
            if ($user) {
                $key = md5(microtime() . rand(0, 10000));
                setcookie('uid', $user['id'], time() + 86400 * 30, '/');
                setcookie('key', md5($key), time() + 86400 * 30, '/');
                $this->db->query("UPDATE admin SET cookie = ? WHERE
						id = ?", $key, $user['id']);
                header("Location: /");
            } else {
                $this->error = "Неправильный email или пароль";
            }
        }
        $this->out('login.php');
    }

    function add()
    {
        if (!$this->user)
            return header("Location: /");

        if (!empty($_POST)) {

            $this->db->query('INSERT INTO post(title,post,ctime)
			 	VALUES(?,?,?)', htmlspecialchars($_POST['title']), $_POST['post'], time());
            header("Location: /");
        }
        $this->out('add.php');
    }

    function del($id)
    {
        if (!$this->user)
            return header("Location: /");

        foreach ($_POST['check'] as $key=> $value){
            $this->db->query('DELETE FROM post WHERE id = ?', $value);
        }

        header('Location: /');

    }

    function edit($id)
    {
        if (!$this->user) return header('Location: /');
        if (!empty($_POST)) {

            $this->db->query("UPDATE post SET title = ?, post = ? WHERE id = ?",
                htmlspecialchars($_POST['title']), $_POST['post'], $id);
            header('Location: /');
        }

        $this->post =
            $this->db->query("SELECT * FROM post WHERE id = ?", $id)->assoc();

        $this->out('add.php');
    }

    function post($id)
    {

        $this->post =
            $this->db->query("SELECT * FROM post WHERE id = ?", $id)->assoc();
        $this->comments =
            $this->db->query("SELECT * FROM comment WHERE postid = ?", $id)->all();
        $this->out('post.php');
    }

    function addComment($postid)
    {
        $this->db->query("INSERT INTO comment(postid, name,post)
          VALUES(?,?,?)", $postid, htmlspecialchars($_POST['name']),
            htmlspecialchars($_POST['post']));
        setcookie('name', $_POST['name'], time() + 86400 * 30, '/');
        header('Location: /?post/' . intval($postid));
    }

    function delComment($commentid, $postid)
    {
        if (!$this->user) return header('Location: /');

        $this->db->query('DELETE FROM comment WHERE id = ?', $commentid);
        header('Location :/?post/' . intval($postid));
    }

    function logoff()
    {
        setcookie('uid', '', 0, '/');
        setcookie('key', '', 0, '/');
        return header('Location: /');
    }
}

?>
