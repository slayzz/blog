 Посты
<?php
foreach ($this->posts as $key => $value) {?>
	<h1><?=$value['title'];?></h1>
	<div><?=$value['post'];?> </div>
  <div>
    <a class="btn btn-danger"href="/~slayzz/?del/
    <?=$value['id'];?>" onclick="return confirm('Точно удалить?')"
    style="color: white;">
    Удалить
    </a>
  </div>
<?php }?>
