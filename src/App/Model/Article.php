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

    public function saveArticle($title, $body, $slug, $image, $user_id)
    {
        $created_at = date("Y-m-d H:i:s");
        $query = $this->db->prepare("INSERT INTO `articles` (`title`, `body`, `slug`, `images`, `user_id`, `created_at`) VALUES (?, ?, ?, ?, ? ,?) ");

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

    public function updateArticle($title, $body, $slug, $image, $user_id)
    {
        $updated_at = date("Y-m-d H:i:s");
        $query = $this->db->prepare("UPDATE `articles` SET `title` = ?, `body` =?,`images` =?, `user_id` =?,`updated_at` =? WHERE `slug` = ?");

        $query->bindValue(1, $title);
        $query->bindValue(2, $body);
        $query->bindValue(3, $image);
        $query->bindValue(4, $user_id);
        $query->bindValue(5, $updated_at);
        $query->bindValue(6, $slug);

        try {
            $query->execute();
        } catch (PDOException $e) {
            die($e->getMessage());
        }

    }

    public function getSlug($title, string $divider = '-')
    {
        // replace non letter or digits by divider
        $title = preg_replace('~[^\pL\d]+~u', $divider, $title);

        // transliterate
        $title = iconv('utf-8', 'us-ascii//TRANSLIT', $title);

        // remove unwanted characters
        $title = preg_replace('~[^-\w]+~', '', $title);

        // trim
        $title = trim($title, $divider);

        // remove duplicate divider
        $title = preg_replace('~-+~', $divider, $title);

        // lowercase
        $title = strtolower($title);

        if (empty($title)) {
            return 'n-a';
        }

        return $title;

    }

    public function processImage($image)
    {
        var_dump($image);
        if (isset($image))
        {
            $errors= array();
            $file_name = $_FILES['image']['name'];
            $file_tmp = $_FILES['image']['tmp_name'];

            if(empty($errors)==true) {
                $image = move_uploaded_file($file_tmp,"images/".$file_name);
                return $file_name;
            }else{
                print_r($errors);
            }

        }
        else {
            return null;
        }


    }
}
