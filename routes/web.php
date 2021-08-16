<?php

use App\Controller\AdminController;
use App\Controller\ArticleController;
use App\Controller\AuthController;
use App\Controller\HomeController;
use Steampixel\Route;


//Auth routes
Route::add('/login', function() {
    $route = new AuthController();
    return $route->showLogin();
});

Route::add('/login-auth', function() {
    $route = new AuthController();
    return $route->login();
}, 'post');

Route::add('/front-register', function() {
    $route = new AuthController();
    return $route->showRegister();
});

Route::add('/register', function() {
    $route = new AuthController();
    return $route->register();
}, 'post');


//Articles
Route::add('/', function() {
    $route = new HomeController();
    return $route->index();
});

Route::add('/show', function (){
    $route = new ArticleController();
    return $route->show();
});

Route::add('/admin', function (){
    $route = new AdminController();
    return $route->index();
});

// Run the router
Route::run('/');
