<?php

class Categories
{
    function get()
    {
        $pdo = new PDO('mysql:host=localhost;dbname=moneyapp', 'root', '');
        $pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false);
        $result = $pdo->query("SELECT CAT.name, SUM(CATSUM.amount) AS total_amount 
        FROM category_summaries AS CATSUM JOIN categories AS CAT 
        WHERE CATSUM.category_id = CAT.id GROUP BY CAT.name;");
        return $result;
    }
}