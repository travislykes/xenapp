<?php


namespace App\Model;


class User
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database;
    }


    public function email_exists($email)
    {

        $query = $this->db->prepare("SELECT COUNT(`id`) FROM `users` WHERE `email`= ?");
        $query->bindValue(1, $email);

        try {

            $query->execute();
            $rows = $query->fetchColumn();

            if ($rows == 1) {
                return true;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            die($e->getMessage());
        }

    }

    public function login($email, $password)
    {

        $query = $this->db->prepare("SELECT `password`, `user_id` FROM `users` WHERE `email` = ?");
        $query->bindValue(1, $email);

        try {

            $query->execute();
            $data = $query->fetch();
            $stored_password = $data['password'];
            $login['id'] = $data['user_id'];

//        password hashing
            $salt1 = '&!@(#+';
            $salt2 = ')!|^}?';
            $result = $salt1 . $password . $salt2;
            $hash = sha1($result);

            if ($stored_password === $hash) {
                return $login;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            die($e->getMessage());
        }

    }

    public function userdata($id)
    {

        $query = $this->db->prepare("SELECT * FROM `users` WHERE `id`= ?");
        $query->bindValue(1, $id);

        try {

            $query->execute();

            return $query->fetch();

        } catch (PDOException $e) {

            die($e->getMessage());
        }

    }

    public function register($name, $email, $password)
    {
//        password hashing
        $salt1 = '&!@(#+';
        $salt2 = ')!|^}?';
        $password = $salt1 . $password . $salt2;
        $password = sha1($password);
        $created_at = date("Y-m-d H:i:s");

        $query = $this->db->prepare("INSERT INTO `users` (`firstname`, `password`, `email`, `created_at`) VALUES (?, ?, ?, ?) ");

        $query->bindValue(1, $name);
        $query->bindValue(2, $password);
        $query->bindValue(3, $email);
        $query->bindValue(4, $created_at);

        try {
            $query->execute();
        } catch (PDOException $e) {
            die($e->getMessage());
        }

    }
}
