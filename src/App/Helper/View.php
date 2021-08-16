<?php


namespace App\Helper;

use Jenssegers\Blade\Blade;

class View
{
    /**
     * Path for views
     */
    const VIEW_PATH = '../views';

    public static function GetView()
    {
        $blade = new Blade(self::VIEW_PATH, 'cache');

        return $blade;

    }

}
