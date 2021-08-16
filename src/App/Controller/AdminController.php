<?php

namespace App\Controller;

use App\Helper\View;

class AdminController
{
    public function index()
    {
        $blade = View::GetView();

        return $blade->make('homepage', ['name' => 'Admin in this Biatch'])->render();

    }
}
