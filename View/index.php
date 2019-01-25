<?php

use App\Models\Article;
use App\View;

require __DIR__ . '/autoload.php';

$news = (new Article())->findLast(3);

$template = __DIR__ . '/App/Templates/index.php';

$view = new View();
$view->news = $news;

echo $view->render($template);
