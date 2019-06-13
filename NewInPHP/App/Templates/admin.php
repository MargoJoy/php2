<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Админ-панель</title>
</head>
<body>
<a href="/">Главная</a><hr>
<a href="/insert">Добавить новость</a><hr>


<table border="1">
    <tr><?php foreach ($this->data['models'] as $article) { ?>

    <?php foreach ($this->data['function'] as $function) { ?>
        <td><?php echo $function($article); ?> </td>
    <?php } ?>
        <td>
            <a href="/update/<?php echo $article->id; ?>">Редактировать</a>
        </td>
        <td>
            <a href="/admin.php/adminChange/delete/<?php echo $article->id; ?>">Удалить</a><hr>
        </td>
    </tr>
    <?php }
    ?>
</table>




</body>
</html>