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
<?php foreach ($news as $article) :?>
    <h2><?php echo $article->title; ?></h2>
    <p><?php echo $article->text; ?></p>
    <p><?php echo $article->author->name ?? 'Аноним'; ?></p>

    <a href="/update/<?php echo $article->id; ?>">Редактировать</a>
    <span>|</span>
    <a href="/admin.php/adminChange/delete/<?php echo $article->id; ?>">Удалить</a><hr>
<?php endforeach;?>
</body>
</html>