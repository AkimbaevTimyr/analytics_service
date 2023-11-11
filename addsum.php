<?php 

include("./db.php");

error_reporting(E_ALL);
ini_set('display_errors', 1);


$pdo = new PDO('mysql:host=localhost;dbname=moneyapp', 'root', '');
$pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false);


if(isset($_POST['category_id']) && isset($_POST['amount']) && isset($_POST['description']))
{
    $sql = $pdo->prepare('INSERT INTO category_summaries (`category_id`, `amount`, `description`, `date`) VALUES (:category_id, :amount, :description, NOW())');
    $sql->bindValue(':category_id', $_POST['category_id'], PDO::PARAM_INT);
    $sql->bindValue(':amount', $_POST['amount'], PDO::PARAM_INT);
    $sql->bindValue(':description', $_POST['description'], PDO::PARAM_STR);
    $sql->execute();
}

