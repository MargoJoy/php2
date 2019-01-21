<?php

use App\Models\Article;

require __DIR__ . '/../../autoload.php';

$news = Article::findAll();

include __DIR__ . '/../templates/admin.php';
