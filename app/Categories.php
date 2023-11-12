<?php

namespace App;

class Categories 
{
    protected $db;

    public function __construct()
    {
        $this->db = Db::getInstance()->getConnection();
    }

    public function get()
    {
        $result = $this->db->query("SELECT CAT.name, SUM(CATSUM.amount) AS total_amount 
        FROM category_summaries AS CATSUM JOIN categories AS CAT 
        WHERE CATSUM.category_id = CAT.id GROUP BY CAT.name;");
        return $result;
    }

    public function getInfoById(int $id)
    {
        $result = $this->db->query('SELECT CATSUM.* FROM category_summaries AS CATSUM WHERE CATSUM.category_id = ' . $id . '');
        return $result;
    }
}