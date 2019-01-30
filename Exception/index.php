<?php
use App\Controller;
use App\DbException;

require __DIR__ . '/autoload.php';

$uri = $_SERVER['REQUEST_URI'];

$parts = explode('/', $uri);



$name = !empty($parts[1]) ? ucfirst($parts[1]): 'Index';
$_GET['id'] = $parts[2];
$class = '\App\Controllers\\' . $name;


try {
    /**
     * @var Controller $ctrl
     */
    $ctrl = new $class;
    $ctrl->dispatch();
} catch (DbException $exception) {
    var_dump($exception);
}



