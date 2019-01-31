<?php

namespace App\Controllers;


use App\Controller;

class Exception extends Controller
{
    public $exception;


    public function action()
    {
       $this->view->exception = $this->exception;
       echo $this->view->render(__DIR__ . '/../Templates/errors.php');
    }
}