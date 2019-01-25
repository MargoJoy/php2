<?php

use App\Models\Article;

require __DIR__ . '/../../autoload.php';

if ( !empty($_POST['title']) && !empty($_POST['text']) ) {
    $article = new Article();

    $article->title = $_POST['title'];
    $article->text = $_POST['text'];

    $article->save();

    header('Location: /App/Controllers/admin.php');
} else {
    header('Location: /App/Controllers/insert.php');
}

