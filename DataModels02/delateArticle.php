<?php
require __DIR__ . '/autoload.php';
if (isset($_GET['id']) && !empty($_GET['id'])){
    $id = $_GET['id'];
    $article = \App\Models\Article::findById($id);

    //$article = new \App\Models\Article();
    $article->delete();

   header('Location: /admin.php');
}
