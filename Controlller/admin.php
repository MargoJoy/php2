<?php
use App\Controller;
require __DIR__ . '/autoload.php';


$name = $_GET['ctrl'] ?? 'Admin';

var_dump($_GET['ctrl']);

if ($_GET['ctrl'] == 'Admin' && $_GET['act'] == 'Insert') {
    echo 'good';
}


var_dump($name);
$class = '\App\Controllers\\' . $name;
var_dump($class);

/**
 * @var Controller $ctrl
 */
$ctrl = new $class;
$ctrl->dispatch();
