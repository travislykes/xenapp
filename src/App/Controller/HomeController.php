<?php

namespace App\Controller;

use App\Helper\View;
use App\Model\Article;
class HomeController
{
    public function index()
    {
        global $conn;
        $view = View::GetView();

        $article = new Article($conn);
        $articles = $article->getAll();

        return $view->make('homepage', ['name' => 'Article show', 'articles'=> $articles])->render();
    }
}
