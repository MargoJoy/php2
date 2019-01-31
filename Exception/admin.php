<?php
use App\Controller;
use App\DbException;
use App\Exception404;
use App\Logger;
use App\MultiException;

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

try {
    $ctrl->$act();

  } catch (DbException | Exception404 $exception) {
    $logger = new Logger();
    $logger->append($exception);
    $logger->save();

    $ctrl = new \App\Controllers\Exception();
    $ctrl->exception = $exception->getMessage();
    $ctrl->dispatch();

} catch (MultiException $exceptions) {
    $ctrl = new \App\Controllers\Exception();
    $messages = [];

    foreach ($exceptions->all() as $exception) {
        $logger = new Logger();
        $logger->append($exception);
        $logger->save();

        $messages[] = $exception->getMessage();
    }
    $ctrl->exception = $messages;
    $ctrl->dispatch();
}







