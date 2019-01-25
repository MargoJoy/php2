<?php

use App\Models\Article;
use App\View;

require __DIR__ . '/../../autoload.php';

$news = Article::findAll();

$template = __DIR__ . '/../Templates/admin.php';

$view = new View();
$view->news = $news;


echo $view->render($template);
