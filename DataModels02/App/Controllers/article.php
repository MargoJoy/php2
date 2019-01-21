<?php

use App\Models\Article;

require __DIR__ . '/../../autoload.php';

$id = $_GET['id'];

if (!empty($id)){
    $article = Article::findById($id);

    include __DIR__ . '/../templates/article.php';
} else {
    header('Location: /index.php');
}

