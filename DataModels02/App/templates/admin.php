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
<a href="/index.php">Главная</a><hr>
<a href="/App/Controllers/insert.php">Добавить новость</a><hr>
<?php foreach ($news as $article) {?>
    <h2><?php echo $article->title; ?></h2>
    <p><?php echo $article->text; ?></p>
    <p><?php echo $article->author; ?></p>

    <a href="/App/Controllers/update.php?id=<?php echo $article->id; ?>">Редактировать</a>
    <span>|</span>
    <a href="/App/Controllers/delete.php?id=<?php echo $article->id; ?>">Удалить</a><hr>
<?php }?>
</body>
</html>