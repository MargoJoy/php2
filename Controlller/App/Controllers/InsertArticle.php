<?php

namespace App\Controllers;


use App\Controller;

class InsertArticle extends Controller
{

    public function action()
    {
        if ( !empty($_POST['title']) && !empty($_POST['text']) ) {
            $article = new \App\Models\Article();

            $article->title = $_POST['title'];
            $article->text = $_POST['text'];

            $article->save();

            header('Location: /?ctrl=Admin');
        } else {
            header('Location: /?ctrl=Insert');
        }
    }
}