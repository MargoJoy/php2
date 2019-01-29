<?php

namespace App\Controllers;


use App\Controller;

class Update extends Controller
{

    public function action()
    {
        if (!empty($_GET['id'])){
            $article = \App\Models\Article::findById($_GET['id']);

            $this->view->article = $article;

            echo $this->view->render( __DIR__ . '/../Templates/update.php');
        } else {
            header('Location: /insert');
            exit;
        }

    }
}

