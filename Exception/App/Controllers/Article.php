<?php
namespace App\Controllers;

use App\Controller;
use App\Exception404;

class Article extends Controller
{

    /**
     * @throws Exception404
     * @throws \App\DbException
     */
    public function action()
    {
        if (!empty($_GET['id']) && $_GET['id']) {
            $article = \App\Models\Article::findById($_GET['id']);
            if (!$article ) {
                throw new Exception404('Запись не найдена');
            } else {
                $this->view->article = $article;
                echo $this->view->render(__DIR__ . '/../Templates/article.php');
            }
        } else {
            header('Location: /index');
        }
    }
}