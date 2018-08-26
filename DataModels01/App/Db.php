<?php

namespace App;


class Db
{
    protected $dbh;
    public function __construct()
    {
        $config = include __DIR__ . '/data/config.php';
        $this->dbh = new \PDO($config['dsn'], $config['user'], $config['password']);
    }

    public function query($sql, $data, $class)
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($data);
        return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
    }

    public function execute($query, $params)
    {
        $sth = $this->dbh->prepare($query);
        return $sth->execute($params);
    }
}
