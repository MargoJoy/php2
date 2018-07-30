<?php

namespace App\Models;


use App\Db;
use App\Model;

class Article extends Model
{
    protected const TABLE = 'news';

    public $id;
    public $title;
    public $text;
    public $author;

    public static function findNews($params = [])
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE . ' ORDER BY id DESC LIMIT ' . $params;
        return $db->query($sql, [], self::class);
    }

}