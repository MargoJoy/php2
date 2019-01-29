<?php
use App\Controller;
require __DIR__ . '/autoload.php';

$uri = $_SERVER['REQUEST_URI'];

$parts = explode('/', $uri);



$name = !empty($parts[1]) ? ucfirst($parts[1]): 'Index';
$_GET['id'] = $parts[2];
$class = '\App\Controllers\\' . $name;

/**
 * @var Controller $ctrl
 */
$ctrl = new $class;
$ctrl->dispatch();




