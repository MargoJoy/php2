<?php

namespace App;


abstract class Model
{
    public $id;
    protected  static $table = null;

    public static function findAll()
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::$table;

        return $db->query($sql , static::class);
    }

    public static function findById($id)
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';

        $data = [':id' => $id];

        $result = $db->query($sql,static::class, $data);
        if (!empty($result)) {
            return $result[0];
        } else {
            return false;
        }

    }
}