<?php

namespace App\Model;

class Article
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database;
    }
    /**
     * Primary key of entity
     */
    public const FIELD_ID = 'id';

    /**
     * Title of article
     */
    public const FIELD_TITLE = 'title';

    /**
     * Content of article
     */
    public const FIELD_BODY = 'body';

    /**
     * Content of article
     */
    public const FIELD_SLUG = 'slug';

    /**
     * Images
     */
    public const FIELD_IMAGES = 'images';

    /**
     * Author of article
     */
    public const FIELD_USER_ID = 'user_id';

    /**
     * Creation date
     */
    public const FIELD_CREATED_AT = 'created_at';

    /**
     * Update date of article
     */
    public const FIELD_UPDATED_AT = 'updated_at';



    /**
     * Returns title
     * @return string Value of Title
     */
    public function GetTitle()
    {
        return $this->get(self::FIELD_TITLE)->getString();
    }

    /**
     * Sets value of Title.
     * @param mixed $value the value to set
     * @return void
     */
    public function SetTitle($value)
    {
        $this->get(self::FIELD_TITLE)->value = $value;
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
}
