<?php

namespace core;
use core\Base;

class Db extends Base
{
    protected $table;
    private $connection;

    public function __construct()
    {
        try {
            $db = require_once './config/config_db.php';
            $this->connection = new \PDO("mysql:host=mysql;dbname=laravel", 'laravel', 'root');
            $this->connection->setAttribute(\PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
        } catch(\PDOException $e)
        {
            die("Database connection failed: " . $e->getMessage());
        }
    }
    public function getConnection()
    {
        return $this->connection;
    }

    public function execute($sql, $params = [])
    {
        $sth = $this->connection->prepare($sql);
        $sth->execute($params);
        return $sth->fetchAll();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM {$this->table}";
        return $this->execute($sql);
    }

}