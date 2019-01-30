<?php

namespace App\Controllers;


use App\DbException;

class AdminChange extends \App\Admin
{


    public function insert()
    {
        if ( !empty($_POST['title']) && !empty($_POST['text']) ) {
            $article = new \App\Models\Article();

            $article->title = $_POST['title'];
            $article->text = $_POST['text'];

            try {
                $article->save();
            } catch (DbException $exception) {
                var_dump($exception);
            }
            //header('Location: /admin');
        } //else {
            //header('Location: /insert');
        //}
    }

    public function update()
    {
        if ( !empty($_POST['title']) && !empty($_POST['text']) ) {

            $article = \App\Models\Article::findById($_POST['id']);

            $article->title = $_POST['title'];
            $article->text = $_POST['text'];

            $article->save();

            header('Location: /admin');
        } else {
            header('Location: /update/?id=' . $_POST['id']);
        }
    }

    public function delete()
    {
        if (!empty($_GET['id'])) {
            $article = \App\Models\Article::findById($_GET['id']);
            $article->delete();
        }

        header('Location: /admin');
        exit;
    }


}