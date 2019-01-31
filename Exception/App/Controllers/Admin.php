<?php

namespace App\Controllers;


use App\Controller;

class Admin extends Controller
{


    /**
     * @throws \App\DbException
     */
    public function action()
    {
        $this->view->news = \App\Models\Article::findAll();

        echo $this->view->render( __DIR__ . '/../Templates/admin.php');
    }
}




