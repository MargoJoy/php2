<?php

namespace App\Controllers;


use App\Controller;

class Delete extends Controller
{

    public function action()
    {
        if (!empty($_GET['id'])) {
            $article = \App\Models\Article::findById($_GET['id']);
            $article->delete();
        }

        header('Location: /?ctrl=Admin');
        exit;
    }
}