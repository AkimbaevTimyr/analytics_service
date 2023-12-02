<?php

namespace App;
use PDOException;
use wfm\Db;

class Categories extends Db
{
    public function get($id)
    {
        try {
            $sql = "SELECT CAT.name, COALESCE(SUM(CATSUM.amount), 0) AS total_amount
                FROM categories AS CAT
                LEFT JOIN category_summaries AS CATSUM ON CAT.id = CATSUM.category_id 
                AND CATSUM.user_id =" . $id . " GROUP BY CAT.name;";
            $result = $this->execute($sql);
            return $result;
        } catch (PDOException $e)
        {
            echo 'Ошибка: ' . $e->getMessage();
            echo 'Файл: ' . $e->getFile();
            echo 'Строка: ' . $e->getLine();
        }
    }

    public function getInfoById(int $id, $user_id)
    {
        $sql = 'SELECT CATSUM.* FROM category_summaries AS CATSUM WHERE CATSUM.category_id = ' . $id . ' AND CATSUM.user_id = ' . $user_id . '';
        $result = $this->execute($sql);
        return $result;
    }
}