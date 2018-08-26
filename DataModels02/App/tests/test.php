<?php
require __DIR__ . '/../../autoload.php';
$db = new \App\Db();


$sql = 'SELECT * FROM news.news WHERE id=:id';
$data = [':id' => 2];

//запрос подстановка, имя класса
var_dump($db->query($sql, $data,\App\Db::class));

//$query = 'INSERT INTO news.news (title, text, author) VALUES (:title, :text, :author)';

$info = [
    ':title' => 'Новый заголовок',
    ':text' => 'Новый текст',
    ':author' => 'Новое имя автора',
];

$db->execute($query, $info);

//----------------------

$query = 'UPDATE news.news SET title=:title WHERE id=:id';

$info = [
    ':id' => '5',
    ':title' => 'Измененный заголовок',
];

var_dump($db->execute($query, $info));

//----------------------
//без подстановок, выводит все содержимое
var_dump($db->query('SELECT * FROM news.news', [],\App\Db::class));


