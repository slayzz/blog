<?php


?>
<h1><?php echo $this->post['title'] ?></h1>

<div>
    <?php echo $this->post['post']; ?>
</div>
<?php if ($this->user) { ?>
<span class="my-button">
      <a class="btn btn-info"
         href="/?edit/<?php $this->post['id'] ?>">Редактировать</a>
      <a class="btn btn-danger"
         href="/?del/<?php echo($this->post['id']) ?>"
         onclick="return confirm('Точно удалить?')"
         style="color: white;">
          Удалить
      </a>
</span>
<?php } ?>
<hr>

<div class="comments">

    <?php foreach ($this->comments as $c) { ?>

        <div class="comment">
            <b>
                <?php echo $c['name'] ?>
            </b>:
            <?php echo $c['post'] ?>
            <?php if ($this->user) { ?>

                <a class="btn btn-danger"
                   href="/?delComment/<?php echo($c['id']) ?>/
               <?php echo $this->post['id'] ?>"
                   onclick="return confirm('Точно удалить?')"
                   style="color: white;">Удалить</a>
            <?php } ?>
        </div>

    <?php } ?>
    <?php if (!$this->user){?>
    <h4>Добавить комментарий: </h4>

    <form method="POST" action="/?addComment/<?php echo $this->post['id'] ?>" class="form-inline well">
        <label for="name">Имя: </label> <input type="text" name="name"
                                               value=
                                               "<?php echo $_COOKIE['name'] ?>">
        <label for="post">Коммент: </label><input type="text" name="post">
        <button type="submit" class="btn btn-primary">Добавить</button>
    </form>
    <?php }?>
</div>
