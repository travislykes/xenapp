<?php
require __DIR__.'/../src/App/Model/User.php';
require __DIR__.'/../config/init.php';

use App\Model\User;

global $conn;
$user = new User($conn);

$name = "Xentral Admin";
$password = "secret";
$email = "test@xentral.com";

try{
    $user->register($name,$email,$password);
    echo "New User registered";
}catch (Exception $e) {
    print_r($e);
}




