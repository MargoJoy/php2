<?php
require __DIR__ . '/autoload.php';

if (!empty($_POST['title']) && !empty($_POST['text']) && !empty($_POST['author'])) {
    $article = new \App\Models\Article();
    $article->title = $_POST['title'];
    $article->text = $_POST['text'];
    $article->author = $_POST['author'];

    $article->save();
    header('Location: /admin.php');
}


include __DIR__ . '/App/templates/append.php';