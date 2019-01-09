<?php
require __DIR__ . '/../../autoload.php';

$db = new \App\Db();

$query = 'INSERT INTO persons (dept, lastname, age) VALUES (:dept, :lastname, :age)';
$params = [':dept' => 1, ':lastname' => 'Пупкин', ':age' => 23];

$testInsert = $db->execute($query, $params);

var_dump($testInsert);


$query = 'UPDATE persons SET lastname=:lastname WHERE id=:id';
$params = [':lastname' => 'Дудкин', ':id' => 13];

$testUpdate = $db->execute($query, $params);

var_dump($testUpdate);

$person = \App\Models\Person::findById(5);

var_dump($person);

