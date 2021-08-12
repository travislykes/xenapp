<?php

namespace App\Controller;

use App\Helper\Views;

class AdminController
{
    public function index()
    {
        $blade = Views::GetView();

        return $blade->make('homepage', ['name' => 'Admin in this Biatch'])->render();

    }
}
