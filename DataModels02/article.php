<?php
require __DIR__ . '/autoload.php';

if (isset($_GET['id']) && !empty($_GET['id'])){
    $id = $_GET['id'];
    $article = \App\Models\Article::findById($id);
    include __DIR__ . '/App/templates/article.php';
} else {
    header('Location: /index.php');
}
