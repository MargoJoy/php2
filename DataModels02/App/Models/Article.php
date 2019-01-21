<?php

namespace App\Models;

use App\Db;
use App\Model;

class Article extends Model
{
    public $title;
    public $text;
    public $author;

    protected static $table = 'news';

    public function findLast(int $params)
    {
        $db = new Db();
        $sql = 'SELECT * FROM '. static::$table .' ORDER BY id DESC LIMIT ' . $params;
        return $db->query($sql,static::class);
    }
}