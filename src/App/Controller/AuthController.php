<?php

namespace App\Controller;

use App\Helper\View;
use App\Model\User;

class AuthController
{
    public function showLogin()
    {
        $view = View::GetView();

        return $view->make('auth.login')->render();
    }

    public function login()
    {
        global $conn;
        $users = new User($conn);
        if(isset($_POST['email'],$_POST['password']))
        {
            $email = trim($_POST['email']);
            $password = $_POST['password'];

            if (empty($email) === true || empty($password) === true) {
                $errors[] = 'Sorry, but we need your username and password.';
            } else if ($users->email_exists($email) === false) {
                $errors[] = 'Sorry that email doesn\'t exists.';
            }  else {
                if (strlen($password) > 18) {
                    $errors[] = 'The password should be less than 18 characters, without spacing.';
                }
                $login = $users->login($email, $password);
                if ($login === false) {
                    $errors[] = 'Sorry, that username/password is invalid';
                }else {
                    $_SESSION['id'] =  $login['id'];
                    $_SESSION['firstname'] =  $login['firstname'];

                }
            }

        }
        $view = View::GetView();
//        if there is an error
        return $view->make('auth.login', ['errors' => $errors])->render();
//        login to admin
    }

    public function showRegister()
    {
        $view = View::GetView();

        return $view->make('auth.register')->render();
    }
    public function register()
    {
        global $conn;
        $users = new User($conn);
        if(isset($_POST['email'],$_POST['password'],$_POST['name']))
        {
            $email = trim($_POST['email']);
            $password = $_POST['password'];
            $name = $_POST['name'];
            $users->register($name, $email, $password);
        }
        else{
//            script create user
        }
        return header('Location: /');;
    }
}
