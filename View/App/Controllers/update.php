<?php

use App\Models\Article;
use App\View;

require __DIR__ . '/../../autoload.php';
$template = __DIR__ . '/../Templates/update.php';

$id = $_GET['id'];

$article = Article::findById($id);

$view = new View();
$view->article = $article;

echo $view->render($template);
