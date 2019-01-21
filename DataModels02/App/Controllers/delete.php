<?php

use App\Models\Article;

require __DIR__ . '/../../autoload.php';

$id = $_GET['id'];

if (!empty($id)) {
    $article = Article::findById($id);
    $article->delete();
}

header('Location: /App/Controllers/admin.php');
exit;