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

<a href="/admin">Админ-панель</a><hr>

<?php foreach ($news as $article) : ?>
    <h2><a href="/article/<?php echo $article->id; ?>"><?php echo $article->title; ?></a></h2>
    <p><?php echo $article->text; ?></p>

    <p><?php echo $article->author->name ?? 'Аноним'; ?></p>
<?php endforeach; ?>

</body>
</html>