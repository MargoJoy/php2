<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Статья</title>
</head>
<body>
<a href="/index.php">Главная</a><hr>

<h2>Статья</h2>

<h2><?php echo $article->title; ?></h2>
<p><?php echo $article->text; ?></p>
<p><?php echo $article->author; ?></p>

</body>
</html>