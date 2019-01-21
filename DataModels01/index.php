<?php
require __DIR__ . '/autoload.php';

$news = (new App\Models\Article)->findLast(3);

include __DIR__ . '/App/templates/index.php';