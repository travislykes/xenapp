<?php

namespace App\Controller;

use App\Helper\View;
use App\Model\Article;

class ArticleController
{
    public function show($slug = null)
    {
        $view = View::GetView();
        $conn = 'database';
        $article = new Article($conn);
        $details = $article->getArticle($slug);

        return $view->make('article', ['article' => 'Article show', 'slug' => $slug])->render();
    }

    public function create()
    {
        $view = View::GetView();

        return $view->make('admin.create-article')->render();
    }

    public function store()
    {
        global $conn;
        $article = new Article($conn);
        $title = $this->test_input($_POST['title']);
        $body = $_POST['body'];
        $slug = $article->getSlug($title);
        $image = $article->processImage($_POST['image']);

        $article->saveArticle($title, $body, $slug, $image);

//        return

    }

    public function edit($slug = null)
    {
        $view = View::GetView();

        return $view->make('admin.edit-article', ['slug'=> $slug])->render();
    }

    public function update()
    {

    }

    private function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
