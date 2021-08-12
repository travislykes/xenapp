<?php

require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/../config/init.php';

use App\Controller\AdminController;
use App\Controller\HomeController;
use Steampixel\Route;

// Add your first route
Route::add('/', function() {
    echo 'Welcome :-)';
});

Route::add('/show', function (){
   $route = new HomeController();
   return $route->index();
});

Route::add('/admin', function (){
    $route = new AdminController();
    return $route->index();
});

// Run the router
Route::run('/');
