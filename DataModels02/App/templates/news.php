<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Шаблон новостей</title>
</head>
<body>
<h1>Последние новости</h1>

<div><a href="/admin.php">Админ панель</a></div>
<?php foreach ($news as $article){ ?>
    <a href="/article.php?id=<?php echo $article->id; ?>">
        <?php echo $article->title;?>
    </a>
    <p><?php echo $article->text;?></p>
    <p><?php echo $article->author;?></p>
<?php } ?>

</body>
</html>