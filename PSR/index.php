<?php

use App\Controller;
use App\DbException;
use App\Exception404;
use App\Logger;

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
} catch (DbException | Exception404 $exception) {

    $logger = new Logger();
    $logger->append($exception);
    $logger->save();

    $ctrl = new \App\Controllers\Exception();
    $ctrl->exception = $exception->getMessage();
    $ctrl->code = $exception->getCode();
    $ctrl->dispatch();
}


