<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use app\Http\Requests\Web\Article\StoreRequest;
use app\Http\Requests\Web\Article\UpdateRequest;
use App\Models\Article;
use Illuminate\Http\RedirectResponse;

class ArticlesController extends Controller
{
    public function create(StoreRequest $request)
    {
        if ($request->hasFile('preview')) {
            $previewImagePath = "/storage/{$request->file('preview')->store('article/previews')}";
        }

        $article = Article::create([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'preview' => $previewImagePath ?? NULL,
            'is_public' => $request->has('is_public')
        ]);

        return redirect()->route('article', [
            'article' => $article->id
        ]);
    }

    public function update(UpdateRequest $request, Article $article)
    {
        if ($request->hasFile('preview')) {
            $previewImagePath = "/storage/{$request->file('preview')->store('article/previews')}";
        }

        $article->update([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'preview_image' => $previewImagePath ?? $article->preview_image,
            'is_public' => !empty($request->input('is_public'))
        ]);

        return redirect()->route('article', [
            'article' => $article->id
        ]);
    }

    public function delete(Article $article): RedirectResponse
    {
        $article->delete();
        return redirect()->route('articles');
    }
}
