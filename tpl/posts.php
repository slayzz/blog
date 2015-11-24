 Посты
<?php 
foreach ($this->posts as $key => $value) {?>
	<h1><?=$value['title'];?></h1>
	<div><?=$value['post'];?> </div>
<?php }?>
