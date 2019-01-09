<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Новости</title>
</head>
<body>

<?php foreach ($news as $article) {?>
    <h3>
        <a href="/article.php?id=<?php echo $article->id?>">
            <?php  echo $article->title;?>
        </a>
    </h3>
    <p><?php  echo $article->text;?></p>
    <p><?php  echo $article->author;?></p>
    <hr>
<?php } ?>

</body>
</html>