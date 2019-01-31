<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ошибка</title>
</head>
<body>

<h1>Ошибка: </h1>

<?php
if (is_array($exception)) {
    foreach ($exception as $error) :?>
        <p><?php echo $error; ?></p>
    <?php endforeach;
    } else {?>
    <p><?php echo $exception;?></p>
<?php }?>



</body>
</html>