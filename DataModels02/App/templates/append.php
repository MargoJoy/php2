<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Добавить</title>
</head>
<body>

<form action="/appendArticle..php" method="post">
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