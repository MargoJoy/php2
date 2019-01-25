<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Добавить новость</title>
</head>
<body>
<a href="/App/Controllers/admin.php">Админ-панель</a><hr>
<h2>Добавить новость</h2>

<form action="/App/Controllers/insertArticle.php" method="post">
    <label for=""><input type="text" name="title" placeholder="Заголовок"></label><br>
    <label for=""><input type="text" name="text" placeholder="Текст"></label><br>
    <label for=""><input type="submit"></label>
</form>

</body>
</html>