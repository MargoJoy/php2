<?php
namespace App\Models;

use App\Db;
use App\Model;

class Article extends Model
{
    public $title;
    public $text;
    public $author_id;

    protected static $table = 'news';

    /**
     * @param $name
     * @return object
     * @throws \App\DbException
     */
    public function __get($name)
    {
        if ('author' == $name && ! empty($this->author_id)) {
            return Author::findById($this->author_id);
        }
        return null;
    }

    /**
     * @param int $params
     * @return array
     * @throws \App\DbException
     */
    public function findLast(int $params)
    {
        $db = new Db();
        $sql = 'SELECT * FROM '. static::$table .' ORDER BY id DESC LIMIT ' . $params;
        return $db->query($sql,static::class);
    }
}