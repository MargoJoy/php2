<?php

use App\Controller;
require __DIR__ . '/autoload.php';


$name = $_GET['ctrl'] ?? 'Index';

$class = '\App\Controllers\\' . $name;


/**
 * @var Controller $ctrl
 */
$ctrl = new $class;
$ctrl->dispatch();

