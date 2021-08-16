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

        return $view->make('article', ['article' => $details])->render();
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

    public function edit($slug)
    {
        global $conn;
        $article = new Article($conn);
        $details = $article->getArticle($slug);
        $view = View::GetView();

        return $view->make('admin.edit-article', ['article'=> $details])->render();
    }

    public function update($slug)
    {

        global $conn;
        $article = new Article($conn);
        $title = $this->test_input($_POST['title']);
        $body = $_POST['body'];

        if (!empty($_FILES['image']['name']))
        {
            $image = $article->processImage($_FILES['image']);
        }
        else {
            $image = $_POST['old_image'];
        }
        $user_id  = $_SESSION['id'];
        $article->updateArticle($title, $body, $slug, $image, $user_id);

        return header('Location: /');
    }

    private function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
