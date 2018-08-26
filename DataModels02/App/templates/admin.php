<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<a href="/index.php">На главную</a>
<h1>Админ панель</h1>

<?php foreach ($news as $article){ ?>
    <h3><a href="/article.php?id=<?php echo $article->id; ?>">
        <?php echo $article->title;?>
    </a></h3>
    <p><?php echo $article->text;?></p>
    <p><?php echo $article->author;?></p>
    <a href="/updateArticle.php?id=<?php echo $article->id; ?>">Изменить новость</a>
    <a href="/delateArticle.php?id=<?php echo $article->id; ?>">Удалить новость</a>
    <hr>
<?php } ?>

<a href="/appendArticle..php">Добавить новость</a>




</body>
</html>