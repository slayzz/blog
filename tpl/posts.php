<form action="/?del" method="post">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>
                Check
            </th>
            <th>
                Название поста
            </th>
            <th>
                Дополнительно
            </th>
        </tr>
        </thead>

        <tbody>
        <?php
        foreach ($this->posts as $key => $value) { ?>
            <tr>

                <td class="first_column"><input type="checkbox" name="check[]" value="<?php echo $value['id'] ?>"></td>
                <td>
                    <h1 class="for_java" xmlns="http://www.w3.org/1999/html">
                        <a href="/?post/<?php echo $value['id'] ?>"><?= $value['title']; ?></a></h1>
                </td>
                <td>
                    <?php if ($this->user) { ?>
                        <a class="btn btn-info" href="/?edit/<?php echo $value['id'] ?>">Редактировать</a>
                    <?php } ?>
                </td>
                <td></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <?php if ($this->user) { ?>
        <input class="btn btn-danger" type="submit" name="sumb" value="Удалить">

    <?php } ?>
</form>


<!--
<span class="my-button">

      <a class="btn btn-danger"
         href="/?del/<?php /*echo($value['id']) */ ?>"
         onclick="return confirm('Точно удалить?')"
         style="color: white;">
          Удалить
      </a>
    </span>-->