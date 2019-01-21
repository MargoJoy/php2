<?php

use App\Models\Article;

require __DIR__ . '/autoload.php';

$news = (new Article())->findLast(3);

include __DIR__ . '/App/templates/index.php';