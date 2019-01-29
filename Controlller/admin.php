<?php
use App\Controller;

require __DIR__ . '/autoload.php';

$uri = $_SERVER['REQUEST_URI'];

$parts = explode('/', $uri);

$name = !empty($parts[2]) ? ucfirst($parts[2]): 'admin';

$class = '\App\Controllers\\' . $name;
$act = $parts[3];
$_GET['id'] = $parts[4];

/**
 * @var Controller $ctrl
 */
$ctrl = new $class;
$ctrl->$act();



