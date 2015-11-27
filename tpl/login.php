<?php
header('Content-Type: text/html; charset=utf-8');
?>

<form method="post" class="form-inline">
  <div class="form-group">
    <label for="mail">Email</label>
    <input type="email" class="form-control" name="mail" placeholder="Твой email">
  </div>
  <div class="form-group">
    <label for="pass">Пароль</label>
    <input type="password" class="form-control" name="pass" placeholder="Твой пароль">
  </div>
  <button type="submit" class="btn btn-default">Войти</button>
  <p class="bg-danger"><?=@$this->error?></p>
</form>
