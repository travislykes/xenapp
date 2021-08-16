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

Route::add('/logout', function (){
    $route = new AuthController();
    return $route->logout();
});

Route::add('/create-article', function (){
    $route = new ArticleController();
    return $route->create();
});

Route::add('/article-save', function() {
    $route = new ArticleController();
    return $route->store();
}, 'post');

Route::add('/', function() {
    $route = new HomeController();
    return $route->index();
});

//Article Routes
Route::add('/([a-z-0-9-]*)', function ($slug){
    $route = new ArticleController();
    return $route->show($slug);
});






Route::add('/admin', function (){
    $route = new AdminController();
    return $route->index();
});




// Run the router
Route::run('/');
