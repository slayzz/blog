<?php
foreach ($this->posts as $key => $value) {?>
  <h1 class="for_java" xmlns="http://www.w3.org/1999/html">
    <a href="/?post/<?php echo $value['id']?>"><?=$value['title'];?></a> </h1>
	<div class="post"><?php echo $value['post']; ?> </div>
  <div>
    <?php if ($this->user) {?>
    <span class = "my-button">
      <a class="btn btn-info"
         href="/?edit/<?php echo $value['id'] ?>">Редактировать</a>
      <a class="btn btn-danger"
        href="/?del/<?php echo ($value['id']) ?>"
        onclick="return confirm('Точно удалить?')"
        style="color: white;">
      Удалить
      </a>
    </span>
    <?php }?>
  </div>
<?php }?>
