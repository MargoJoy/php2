<?php
namespace App;

class Db
{
    protected $dbh;

    /**
     * Db constructor.
     * @throws DbException
     */
    public function __construct()
    {
        $config = Config::getInstance();

        try {
            $this->dbh = new \PDO(
                $config->data['db']['host'] .
                $config->data['db']['name'],
                $config->data['db']['user'],
                $config->data['db']['password']
            );
        } catch (\PDOException $exception) {
            throw new DbException(' Что то пошло не так с подключением', 42);
        }
    }

    /**
     * @param $sql
     * @param $class
     * @param array $params
     * @return array
     * @throws DbException
     */
    public function query($sql, $class, $params = [])
    {
        $sth = $this->dbh->prepare($sql);

        if (!$sth->execute($params)) {
            throw new DbException(' Что то пошло не так с запросом', 43);
        } else {
            return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        }
    }

    /**
     * @param $sql
     * @param $class
     * @param array $params
     * @return array
     * @throws DbException
     */
    public function queryEach($sql, $class, $params = [])
    {
        $sth = $this->dbh->prepare($sql);

        if (!$sth->execute($params)) {
            throw new DbException(' Что то пошло не так с запросом', 43);
        }

        $sth->setFetchMode(\PDO::FETCH_CLASS, $class);
        while ($record = $sth->fetch()){
            yield $record;
        }
    }

    /**
     * @param $query
     * @param array $params
     * @return bool
     * @throws DbException
     */
    public function execute($query, $params = [])
    {
        if (!$sth = $this->dbh->prepare($query)) {
            throw new DbException(' Что-то пошло не так с запросом', 44);
        } else {
            return $sth->execute($params);
        }

    }

    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }
}



/*

The inspection is intended to point at the following types of inconsistencies:
The function/method contains return statements with arguments as well as without them
The function/method may happen to return a value or end it's execution without a return statement at all
The function/method is declared void but contains return statements with arguments
Technically these are not errors but practically usually indicate programmer’s mistakes.

*/