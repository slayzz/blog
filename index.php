<?php
header('Content-Type: text/html; charset=utf-8');
include "lib/db.php";
include "lib/base.php";
$new = new app(substr($_SERVER['REQUEST_URI'],2));

 ?>
<!-- <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Супер блог</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
	<div id="main_head">
		<h1>Супер Крутой бложик</h1>
	</div>
	<div id="main_inform">
		<p>Здесь будет контент</p>
		<img src="скачанные файлы.jpg" ></img>
	</div>
	<form method="POST" action="action.php" class="form_for_user">
		<label for="user_text">Запиши здесь свой текст, который хочешь поместить</label>
		<textarea name="user_text" value="button" cols="70" rows="10"></textarea><br/>
		<input name="send" type="submit" value="Добавить"></input>
	</form>
</body>
</html> -->
