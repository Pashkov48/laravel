<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Comment;


class PagesController extends Controller
{
    public function hello()
    {
        return view('pages.hello');
    }

    public function home()
    {
        return view('pages.home');
    }

    public function articles()
    {
        $articles = Article::all();
        return view('pages.articles', [
            'articles' => $articles
        ]);
    }

    public function showArticle(Article $article)
    {
        $comment = Comment::find(1);
        return view('pages.article', [
            'article' => $article
        ]);
    }

    public function createArticleForm()
    {
        return view('pages.article_create');
    }

    public function updateArticleForm(Article $article)
    {
        return view('pages.article_edit', [
            'article' => $article
        ]);
    }
}
