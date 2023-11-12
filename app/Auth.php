<?php

namespace App;
use PDO;
use wfm\Base;

class Auth extends Base
{
    private $db;

    public function __construct()
    {
        $this->db = Db::getInstance()->getConnection();
    }

    public function login($email, $password)
    {
        $sql = $this->db->prepare('SELECT * FROM users WHERE email = :email');
        $sql->bindValue(':email', $email, PDO::PARAM_STR);
        $sql->execute();
        $user = $sql->fetch(PDO::FETCH_ASSOC);

        if (password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user'] = $email;
            $_SESSION['user_id'] = $user['id'];
            session_write_close();
            $this->Redirect('/index.php');
        } else {
            echo 'Wrong password';
        }
    }

    public function signup($email, $password)
    {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $sql = $this->db->prepare('INSERT INTO users (`email`, `password`) VALUES (:email, :password)');
        $sql->bindValue(':email', $email, PDO::PARAM_STR);
        $sql->bindValue(':password', $passwordHash, PDO::PARAM_STR);
        $sql->execute();

        $this->Redirect('/loginform.php');
    }

    public function logout()
    {
        session_start();
        unset($_SESSION['user']);
        session_destroy();
        $this->Redirect('/loginform.php');
    }

}