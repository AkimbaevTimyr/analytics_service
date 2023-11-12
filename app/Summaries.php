<?php

namespace App;
use PDO;

class Summaries
{
    protected $db;

    public function __construct()
    {
        $this->db = Db::getInstance()->getConnection();
    }

    public function addSum($cat_id, $amount, $description)
    {
        $sql = $this->db->prepare('INSERT INTO category_summaries (`category_id`, `amount`, `description`, `date`) VALUES (:category_id, :amount, :description, NOW())');
        $sql->bindValue(':category_id', $cat_id, PDO::PARAM_INT);
        $sql->bindValue(':amount', $amount, PDO::PARAM_INT);
        $sql->bindValue(':description', $description, PDO::PARAM_STR);
        $sql->execute();
    }
}