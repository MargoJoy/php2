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
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id = :id';

        $data = [':id' => $id];

        $result = $db->query($sql,static::class, $data);

        if (!empty($result)) {
            return $result[0];
        } else {
            return false;
        }
    }

    public function isNew()
    {
        return null === $this->id;
    }

    public function insert()
    {
        $properties = get_object_vars($this);

        $cols = [];
        $brind = [];
        $data = [];

        foreach ($properties as $name => $value) {
            if ('id' == $name) {
                continue;
            }

            $cols[] = $name;
            $brind[] = ':' . $name;
            $data[':' . $name] = $value;
        }

        $sql = 'INSERT INTO ' . static::$table . ' (' . implode(', ', $cols) . ') VALUES (' . implode(', ', $brind) . ')';

        $db = new Db();
        $db->execute($sql, $data);
        $this->id = $db->lastInsertId();
    }

    public function  update()
    {
        $properties = get_object_vars($this);
        $cols = [];
        $data = [];

        foreach ($properties as $name => $value) {
            $data[':' . $name] = $value;

            if ('id' == $name) {
                continue;
            }

            $cols[] = $name . '=:' . $name;
        }

        $sql = 'UPDATE ' . static::$table . ' SET ' . implode(', ', $cols) . ' WHERE id=:id';

        $db = new Db();
        $db->execute($sql, $data);

    }

    public function save()
    {
        if (!$this->isNew()) {
            $this->update();
        } else {
            $this->insert();
        }
    }

    public function delete()
    {
        $sql = 'DELETE FROM ' . static::$table . ' WHERE id=:id';
        $id = [':id' => $this->id];
        $db = new Db();
        $db->execute($sql, $id);
    }
}