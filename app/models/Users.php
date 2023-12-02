<?php

namespace App\Models;

use core\Db;

class Users extends Db 
{
    public function getUserStats($date1, $date2)
    {
        // $sql="SELECT U.username, A.user_id, A.type, A.status, count(1) as count 
		// 	FROM `add_post` A, users U 
		// 	WHERE U.id=A.user_id 
		// 	AND A.`add_date` >= '".$date1." 00:00:00' 
		// 	AND A.`add_date` < '".$date2." 23:59:59' 
		// 	AND A.`parent_id` = 0 
		// 	AND A.`project_id` != 3 
		// 	GROUP BY A.user_id, A.type, A.status";
        $sql = "SELECT U.username, A.user_id, A.type, A.status, count(1) as count 
        FROM `add_post` A, users U 
        WHERE U.id=A.user_id 
        AND A.`add_date` >= '2023-11-02 00:00:00' 
        AND A.`add_date` < '2023-12-02 23:59:59' 
        AND A.`parent_id` = 0 
        AND A.`project_id` != 3 
        GROUP BY A.user_id, A.type, A.status;";
        $result = $this->execute($sql);
        return $result;
    }
}