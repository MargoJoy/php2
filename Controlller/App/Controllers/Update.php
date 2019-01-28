<?php

namespace App\Controllers;


use App\Controller;

class Update extends Controller
{

    public function action()
    {
        $article = \App\Models\Article::findById($_GET['id']);

        $this->view->article = $article;

        echo $this->view->render( __DIR__ . '/../Templates/update.php');
    }
}

