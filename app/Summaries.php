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

    public function addSum(int $cat_id, int $amount, string $description , int $user_id): void
    {
        $sql = $this->db->prepare('INSERT INTO category_summaries (`category_id`, `user_id`, `amount`, `description`, `date`) VALUES (:category_id, :user_id, :amount, :description, NOW())');
        $sql->bindValue(':category_id', $cat_id, PDO::PARAM_INT);
        $sql->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $sql->bindValue(':amount', $amount, PDO::PARAM_INT);
        $sql->bindValue(':description', $description, PDO::PARAM_STR);
        $sql->execute();
    }
}