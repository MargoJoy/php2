<?php

namespace App;


class AdminDataTable
{
    protected $models;
    protected $function;

    public function __construct(array $models, array $function)
    {
        $this->models = $models;
        $this->function = $function;
    }

    public function render($template)
    {
         //$template = __DIR__ . '/Templates/admin.php';
         $view = new View();
         $view->models = $this->models;
         $view->function = $this->function;
         echo $view->render($template);
    }
}