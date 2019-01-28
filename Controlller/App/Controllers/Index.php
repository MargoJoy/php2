<?php

namespace App\Controllers;


use App\Controller;
use App\Models\Article;

class Index extends Controller
{

    public function action()
    {
        $this->view->news = (new Article())->findLast(3);
        echo $this->view->render( __DIR__ . '/../Templates/index.php');
    }
}