<?php

namespace App;
use PDO;
use wfm\TSingleton;

class Db {

    use TSingleton;

    private $conn;

    public function __construct()
    {
        try {
            $db = require_once '../config/config_db.php';
            $this->conn = new PDO("mysql:host={$db['host']};dbname={$db['dbname']}", $db['user'], $db['password']);
            $this->conn->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
        } catch(\PDOException $e)
        {
            die("Database connection failed: " . $e->getMessage());
        }
    }

    public function getConnection()
    {
        return $this->conn;
    }
    
}

