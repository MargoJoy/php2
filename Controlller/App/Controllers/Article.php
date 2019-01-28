<?php
namespace App\Controllers;

use App\Controller;

class Article extends Controller
{

    public function action()
    {
        if (!empty($_GET['id'])){

            $article = \App\Models\Article::findById($_GET['id']);
            $this->view->article = $article;
            echo $this->view->render(__DIR__ . '/../Templates/article.php');
        } else {
            header('Location: /index.php');
        }
    }
}