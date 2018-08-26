<?php

namespace App;

//подключение базы
class Db
{
//свойство для обьекта базы
    protected $dbh;
    public function __construct()
    {
//подключение к файлу с данными (имя, пользователь, пароль)
        $config = new Config();
//создаие обьекта PDO с данными из файла конфиг
        $this->dbh = new \PDO($config->data['db']['host'] . $config->data['db']['name'], $config->data['db']['user'], $config->data['db']['password']);
    }

//метод возвращающий данные
    public function query($sql, $data, $class)
    {
//подготовка запроса
        $sth = $this->dbh->prepare($sql);
//выползнение запроса, с учетом параметров подстановки
        $sth->execute($data);
//возвращает полученые дпнные от базы в виде обьектов класса, нужный класс указан вторым параметром
        return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
    }

//метод выполняющий запросы, без возвращения данных
    public function execute($query, $params)
    {
//подготовка запроса
        $sth = $this->dbh->prepare($query);
//выползнение запроса, с учетом параметров подстановки
        return $sth->execute($params);
    }

    public function lastInsertId()
    {
//Возвращает идентификатор последней вставленной строки или значения последовательности
        return $this->dbh->lastInsertId();
    }
}
