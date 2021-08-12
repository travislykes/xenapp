<?php

namespace App\Model;

class Article
{
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
}
