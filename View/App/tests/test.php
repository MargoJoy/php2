<?php

use App\Models\Article;
use App\Models\Author;
use App\Models\Person;

require __DIR__ . '/../../autoload.php';

/*$db = new \App\Db();

$query = 'INSERT INTO persons (dept, lastname, age) VALUES (:dept, :lastname, :age)';
$params = [':dept' => 1, ':lastname' => 'Пупкин', ':age' => 23];

$testInsert = $db->execute($query, $params);

var_dump($testInsert);


$query = 'UPDATE persons SET lastname=:lastname WHERE id=:id';
$params = [':lastname' => 'Дудкин', ':id' => 13];

$testUpdate = $db->execute($query, $params);

var_dump($testUpdate);

$person = \App\Models\Person::findById(5);

var_dump($person);*/

//findAll()

/*$person = Person::findAll();

var_dump($person);

//Config
$config = new \App\Config;

var_dump($config->Data['db']['host']);*/

//update

/*$person = Person::findById(4);

$person->lastname = 'Онегина';
$person->age = '20';
$person->dept = 3;

$person->update();

var_dump($person);*/

//save

/*$person = Person::findById(3);

$person->lastname = 'Демидов';
$person->age = '34';
$person->dept = 1;

$person->save();

var_dump($person);*/

//delete

/*$persons = Person::findById(5);
$persons->delete();*/


//Author

/*$author = Author::findById(2);


var_dump($author->name);*/

$article = Article::findById(5);

//echo $article->author->name ?? 'неизвестен';

var_dump($article->author->name);
var_dump($article);



























