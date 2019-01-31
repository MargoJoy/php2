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
            throw new DbException(' Что то пошло не так с подключением');
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
            throw new DbException(' Что то пошло не так с запросом');
        } else {
            return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
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
            throw new DbException(' Что-то пошло не так с запросом');
        } else {
            return $sth->execute($params);
        }

    }

    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }
}