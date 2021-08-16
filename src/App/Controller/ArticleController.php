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
}
