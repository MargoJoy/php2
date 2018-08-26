<?php

namespace App;


class Db
{
    protected $dbh;
    public function __construct()
    {
        $config = Config::getInstance();
        $this->dbh = new \PDO($config->data['db']['host'] . $config->data['db']['name'], $config->data['db']['user'], $config->data['db']['password']);
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

    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }
}
