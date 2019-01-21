<?php
require __DIR__ . '/autoload.php';

if (!empty($_GET['id'])) {
    $article= \App\Models\Article::findById($_GET['id']);

    include __DIR__ . '/App/templates/article.php';
} else {
    header('Location: /index.php');
}
