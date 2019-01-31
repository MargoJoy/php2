<?php

namespace App\Controllers;



use App\DbException;
use App\Exception404;

class AdminChange extends \App\Admin
{


    /**
     * @throws DbException
     * @throws \App\MultiException
     */
    public function insert()
    {

        if ( !empty($_POST)) {
            $article = new \App\Models\Article();

            $article->title = $_POST['title'];
            $article->text = $_POST['text'];
            $article->fill($_POST);
            $article->save();

            header('Location: /admin');
            exit;
        }
    }

    /**
     * @throws DbException
     * @throws Exception404
     */
    public function update()
    {
        if ( !empty($_POST)) {

            $article = \App\Models\Article::findById($_POST['id']);

            if (!$article  && !is_int($_GET['id'])) {
                throw new Exception404('Запись не найдена');
            } else {

                $article->title = $_POST['title'];
                $article->text = $_POST['text'];

                $article->fill($_POST);
                $article->save();

                header('Location: /admin');
            }
        }
    }

    /**
     * @throws DbException
     * @throws Exception404
     */
    public function delete()
    {
        if (!empty($_GET['id'])) {
            $article = \App\Models\Article::findById($_GET['id']);

            if (!$article && !is_int($_GET['id'])) {
                throw new Exception404('Запись не найдена');
            } else {
                $article->delete();
            }
        }

        header('Location: /admin');
        exit;
    }


}