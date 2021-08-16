<?php

namespace App\Model;

class Article
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database;
    }


    public function getArticle($slug)
    {

        $query = $this->db->prepare("SELECT * FROM `articles` WHERE `slug`= ?");
        $query->bindValue(1, $slug);

        try {

            $query->execute();

            return $query->fetch();

        } catch (PDOException $e) {

            die($e->getMessage());
        }
    }

    public function getAll()
    {

        $query = $this->db->prepare("SELECT * FROM  `articles`");

        try {

            $query->execute();

            return $query->fetchAll();

        } catch (PDOException $e) {

            die($e->getMessage());
        }
    }

    public function saveArticle($title, $body, $slug, $image)
    {
        $user_id ='';
        $created_at = '';
        $query = $this->db->prepare("INSERT INTO `users` (`title`, `body`, `slug`, `images`, `user_id`, `created_at`) VALUES (?, ?, ?, ?, ? ,?) ");

        $query->bindValue(1, $title);
        $query->bindValue(2, $body);
        $query->bindValue(3, $slug);
        $query->bindValue(4, $image);
        $query->bindValue(5, $user_id);
        $query->bindValue(6, $created_at);

        try {
            $query->execute();
        } catch (PDOException $e) {
            die($e->getMessage());
        }

    }

    public function getSlug($title)
    {


        try {

        } catch (PDOException $e) {
            die($e->getMessage());
        }

    }

    public function processImage($image)
    {


        try {

        } catch (PDOException $e) {
            die($e->getMessage());
        }

    }
}
