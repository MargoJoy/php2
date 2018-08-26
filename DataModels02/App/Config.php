<?php

namespace App;


class Config
{
    public $data;

    public function __construct()
    {
        $data = include __DIR__ . '/data/config.php';
        $this->data = $data;
    }

}