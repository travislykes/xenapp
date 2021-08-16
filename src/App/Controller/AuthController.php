<?php

namespace App\Controller;

use App\Helper\View;

class AuthController
{

    public function showLogin()
    {
        $view = View::GetView();

        return $view->make('auth.login')->render();
    }

    public function login()
    {

    }
}
