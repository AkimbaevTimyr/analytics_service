<?php

namespace App;
use PDO;

class Transactions
{
    protected $db;

    public function __construct()
    {
        $this->db = Db::getInstance()->getConnection();
    }    

    public function getAll(int $user_id): array
    {
        $transactions = $this->db->query('SELECT date, amount, category_id, description, id
                                            FROM category_summaries WHERE user_id = ' . $user_id . '
                                            GROUP BY date, amount, category_id, description, id ORDER BY date DESC'
                                        );
        $dailySummary = $this->db->query('SELECT id, date, SUM(amount) as total_amount FROM category_summaries 
                                            WHERE user_id = ' . $user_id . '
                                            GROUP BY date ORDER BY date DESC;');
        
        return [
            'transactions' => $transactions->fetchAll(PDO::FETCH_ASSOC),
            'dailySummary' => $dailySummary,
        ];
    }

}