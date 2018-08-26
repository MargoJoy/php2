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

    public function isNew()
    {
        return null === $this->id;
    }

    public function insert()
    {
        if (!$this->isNew()){
            return false;
        }
        $properties = get_object_vars($this);
        $cols = [];
        $binds = [];
        $data = [];

        foreach ($properties as $name => $values) {
            if ('id' == $name) {
                continue;
            }
            $cols[] = $name;
            $binds[] = ':' . $name;
            $data[':' . $name] = $values;
        }

        $sql = 'INSERT INTO ' . static::TABLE . ' (' . implode(', ', $cols) . ') VALUES ('. implode(', ', $binds) .')';

        $db = new Db();
        $db->execute($sql, $data);

        $this->id = $db->lastInsertId();
    }

    public function update()
    {
        $properties = get_object_vars($this);
        $cols = [];
        $data = [];

        foreach ($properties as $name => $value) {

            $data[':' . $name] = $value;
            $cols[] = $name . '=:' . $name;
        }

        $sql = 'UPDATE ' . static::TABLE . ' SET ' . implode(', ', $cols) . ' WHERE id=:id';
        $db = new Db();
        $db->execute($sql, $data);
    }

    public function save()
    {
        if ($this->isNew()) {
            $this->insert();
        } else {
           $this->update();
        }
    }

    public function delete()
    {
        $sql = 'DELETE FROM ' . static::TABLE . ' WHERE id=:id';

        $db = new Db();
        $db->execute($sql, [':id' => $this->id]);
    }


}