
<form accept-charset="utf-8" class="form-horizontal" method="post">
  <div class="form-group form-group-lg">
    <label class="col-sm-2 control-label"
		for="formGroupInputLarge">Заголовок</label>
    <div class="col-sm-10">
      <input name="title" class="form-control" type="text"
			id="formGroupInputLarge"
			value="<?=@$this->post['title']?>"
			placeholder="Заголовок здесь" >
    </div>
  </div>
	<label for="text">Текст</label>
	<textarea name="post" class="form-control" rows="3"
	style="height: 300px;"><?php echo $this->post['post'] ?></textarea>
	<button name="submiitus" type="submit" class="btn btn-primary">Добавить</button>
</form>
