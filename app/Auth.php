<?php

namespace App;

use Exception;
use PDO;
use wfm\Base;

class Auth extends Base
{
    private $db;

    public function __construct()
    {
        $this->db = Db::getInstance()->getConnection();
    }

    public function login($email = null, $password = null)
    {
        try{
            $this->validateLogin($email, $password);
            $user = $this->getUser($email, $password);
            $validated = $this->validatePassword($user, $password);
            if($validated){
                $this->handleSession($user);
            }
        } catch (CustomException $e) {
            throw new CustomException($e->getMessage(), $e->getCode());
        }
    }

    public function signup($email, $password)
    {
        try{
            if(!empty($email) && !empty($password))
            {
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                $sql = $this->db->prepare('INSERT INTO users (`email`, `password`) VALUES (:email, :password)');
                $sql->bindValue(':email', $email, PDO::PARAM_STR);
                $sql->bindValue(':password', $passwordHash, PDO::PARAM_STR);
                $sql->execute();
        
                $this->Redirect('/loginform.php');
            } else {
                echo 'Введите логин или пароль';
            }
            
        } catch (CustomException $e) {
            throw new CustomException($e->getMessage(), $e->getCode());
        }
    }

    public function logout()
    {
        session_start();
        unset($_SESSION['user']);
        session_destroy();
        $this->Redirect('/loginform.php');
    }


    private function validateLogin($email, $password)
    {
        if($email === null || $password === null || empty($email) || empty($password))
        {
            throw new CustomException('Введите логин или пароль', 400);
        }
    }

    private function getUser($email, $password)
    {
        $sql = $this->db->prepare('SELECT * FROM users WHERE email = :email');
        $sql->bindValue(':email', $email, PDO::PARAM_STR);
        $sql->execute();
        $user = $sql->fetch(PDO::FETCH_ASSOC);

        if(empty($user)){
            throw new CustomException('User not found', 404);
        }
        return $user;
    }

    private function validatePassword($user, $password)
    {
        if (password_verify($password, $user['password'])) {
            return true;
        } else {
            throw new CustomException('Wrong password', 400);
        }
    }
    
    private function handleSession($user)
    {
        session_start();
        $_SESSION['user'] = $user['email'];
        $_SESSION['user_id'] = $user['id'];
        session_write_close();
        $this->Redirect('/index.php');
    }
}