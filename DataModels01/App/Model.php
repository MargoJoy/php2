<?php
namespace App;


abstract class Model
{
    protected const TABLE = null;
    public $id;

    public static function findAll()
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE;
        return $db->query( $sql , [],static::class);
    }

    public static function findById($id)
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE id=:id';
        $data = [':id' => $id];
        $result = $db->query($sql, $data, static::class);
        if (!empty($result)) {
            return $result[0];
        } else {
            return false;
        }
    }


}