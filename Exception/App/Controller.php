<?php

namespace App;


abstract class Controller
{
    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }

    protected function access() : bool
    {
        return true;
    }

    public function dispatch()
    {
        if ($this->access()) {
            return $this->action();
        } else {
            die('Доступ закрыт');
        }
    }

    abstract public function action();

}