<?php

use App\Models\Article;

require __DIR__ . '/../../autoload.php';

$id = $_GET['id'];

$article = Article::findById($id);

include __DIR__ . '/../templates/update.php';
