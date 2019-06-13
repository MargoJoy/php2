<?php
namespace App\Controllers;

use App\Controller;

class Insert extends Controller
{
    public function action()
    {

        echo $this->view->render(__DIR__ . '/../Templates/insert.php');
    }
}



