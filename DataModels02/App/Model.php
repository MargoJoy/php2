<?php
namespace App;

//абстрактный (описательный) класс
abstract class Model
{
//шаблонное имя таблички
    protected const TABLE = null;
    public $id;

//статический метод связанный с классом в целом, не конкретным
    public static function findAll()
    {
//объект базы данных
        $db = new Db();
//запрос с вызовом данных, из шаблонной таблички (вызывается в отдельной модели)
        $sql = 'SELECT * FROM ' . static::TABLE;
//возвращение данных по кузанным параметрам
        return $db->query( $sql , [],static::class);
    }

    public static function findById($id)
    {
//объект базы данных
        $db = new Db();
//шаблон запроса
        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE id=:id';
//шаблон параметра
        $data = [':id' => $id];
//отправка запроса
        $result = $db->query($sql, $data, static::class);
//ответ на выполнение запроса
        if (!empty($result)) {
//возвращается массив, с указанием ключа от единственного вернувшегося элемента, получается обьект
            return $result[0];
        } else {
            return false;
        }
    }

//метод который определяет новый обьект или нет
    public function isNew()
    {
        return null === $this->id;
    }


//активная модель, создание обьекта который САМ СЕБЯ вставляет в базу
    public function insert()
    {
//если не новый обьект то верни фалс
        if (!$this->isNew()){
            return false;
        }
//собирает все свойства обьекта
        $properties = get_object_vars($this);
//будут сохраняться названия полей бд которые будут вставляться
        $cols = [];

//массив для подстановок
        $binds = [];

//массив для данных
        $data = [];

//перебирает свойства обьекта
        foreach ($properties as $name => $values) {
            if ('id' == $name) {
                continue;
            }
//к сиску полей добавляется имя
            $cols[] = $name;
//подстановка
            $binds[] = ':' . $name;
// реальные данные
            $data[':' . $name] = $values;
        }

//создание запроса INSERT INTO prod.product (name, price, weight) VALUES (:name, :price, :weight)
        $sql = 'INSERT INTO ' . static::TABLE . ' (' . implode(', ', $cols) . ') VALUES ('. implode(', ', $binds) .')';

        $db = new Db();
//выполнение запроса
        $db->execute($sql, $data);

        $this->id = $db->lastInsertId();
    }

    public function update()
    {
//собирает все свойства обьекта
        $properties = get_object_vars($this);
//будут сохраняться названия полей бд которые будут изменяться
        $cols = [];
//массив для данных
        $data = [];

        foreach ($properties as $name => $value) {

            $data[':' . $name] = $value;
            $cols[] = $name . '=:' . $name;
        }

        $sql = 'UPDATE ' . static::TABLE . ' SET ' . implode(', ', $cols) . ' WHERE id=:id';
        $db = new Db();
//выполнение запроса
        $db->execute($sql, $data);
    }

    public function save()
    {

        if ($this->isNew()) {
            //если id === null, вставляем, если не null то перезапись
            //echo 'insert';
            $this->insert();
        } else {
            //echo 'update';
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