<?php

namespace App;
use PDO;

class Db {
    private static $instance = null;
    private $conn;

    private $host = "localhost";
    private $dbname = "moneyapp";
    private $user = "root";
    private $password = "";


    public function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname",$this->user, $this->password);
            $this->conn->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
        } catch(\PDOException $e)
        {
            die("Database connection failed: " . $e->getMessage());
        }
    }

    public static function getInstance()
    {
        if(!self::$instance)
        {
            self::$instance = new Db();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->conn;
    }
    
}

