<?php
namespace App\Controllers;

use App\AdminDataTable;
use App\Controller;

class Admin extends Controller
{
    /**
     * @throws \App\DbException
     */
    public function action()
    {
        $models = \App\Models\Article::findAll();
        $functions = include __DIR__ . '/../functions.php';
        $table = new AdminDataTable($models, $functions);
        $table->render(__DIR__ . '/../Templates/admin.php');
    }
}




