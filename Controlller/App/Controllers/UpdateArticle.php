<?php
namespace App\Controllers;


use App\Controller;

class UpdateArticle extends Controller
{

    public function action()
    {
        if ( !empty($_POST['title']) && !empty($_POST['text']) ) {

            $article = \App\Models\Article::findById($_POST['id']);

            $article->title = $_POST['title'];
            $article->text = $_POST['text'];

            $article->save();

            header('Location: /?ctrl=Admin');
        } else {
            header('Location: /?ctrl=Update&id=' . $_POST['id']);
        }
    }
}