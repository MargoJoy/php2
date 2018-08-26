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
<h3><?php echo $article->title;?></h3>
<p><?php echo $article->text; ?></p>
<p><?php echo $article->author; ?></p>

<form action="/updateArticle.php?id=<?php echo $article->id;?>" method="post">
    <input type="hidden" name="id" value="<?php echo $article->id; ?>">
    <label for="">
        <span>Заголовок</span><br>
        <input type="text" name="title">
    </label><br>
    <label for="">
        <span>Автор</span><br>
        <input type="text" name="author">
    </label><br>
    <label for="">
        <span>Текст</span><br>
        <textarea name="text" ></textarea>
    </label><br>
    <button type="submit">Сохранить</button>
</form>

</body>
</html>