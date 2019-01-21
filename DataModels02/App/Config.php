<?php
namespace App;


class Config
{
    protected static $instance;
    public $data;

    protected function __construct()
    {
        $this->data = include __DIR__ . '/data/config.php';
    }

    private function __clone () {}
    private function __wakeup () {}

    public static function getInstance()
    {
        if (self::$instance != null) {
            return self::$instance;
        }
        return new self;
    }


}