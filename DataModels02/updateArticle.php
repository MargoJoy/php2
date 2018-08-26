<?php
require __DIR__ . '/autoload.php';

if (isset($_GET['id']) && !empty($_GET['id']) ){
    $id = $_GET['id'];
    $article = \App\Models\Article::findById($id);

    if (!empty($_POST['title']) && !empty($_POST['text']) && !empty($_POST['author']) && !empty($_POST['id'])) {
        $article->id = $_POST['id'];
        $article->title = $_POST['title'];
        $article->text = $_POST['text'];
        $article->author = $_POST['author'];

        $article->save();
        header('Location: /admin.php');
    }

}

include __DIR__ . '/App/templates/update.php';