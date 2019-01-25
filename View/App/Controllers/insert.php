<?php
require __DIR__ . '/../../autoload.php';
use App\View;

$template = __DIR__ . '/../Templates/insert.php';

$view = new View();
echo $view->render($template);