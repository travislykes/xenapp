<?php

namespace App\Controller;

use App\Helper\View;
use App\Model\Article;

class ArticleController
{
    public function show($slug)
    {
        global $conn;
        $view = View::GetView();
        $article = new Article($conn);
        $details = $article->getArticle($slug);
//var_dump($details);
        return $view->make('article', ['details' => $details])->render();
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
        $image = $article->processImage($_FILES['image']);

        $user_id  = $_SESSION['id'];
        $article->saveArticle($title, $body, $slug, $image, $user_id);

        return header('Location: /');

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
