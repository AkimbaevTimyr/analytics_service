<?php


$pdo = new PDO('mysql:host=localhost;dbname=moneyapp', 'root', '');
$pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false);
