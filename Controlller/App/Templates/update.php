<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Изменение новости</title>
</head>
<body>
<a href="/admin">Админ-панель</a><hr>
<h2>Изменить новость</h2>

<h2><?php echo $article->title; ?></h2>
<p><?php echo $article->text; ?></p>
<p><?php echo $article->author->name ?? 'Аноним'; ?></p>

<form action="/admin.php/AdminChange/update" method="post">
    <label for=""><input type="text" name="title" placeholder="Заголовок"></label><br>
    <label for=""><input type="text" name="text" placeholder="Текст"></label><br>
    <label for=""><input type="hidden" name="id" value="<?php echo $article->id; ?>"></label><br>
    <label for=""><input type="submit"></label>
</form>
</body>
</html>