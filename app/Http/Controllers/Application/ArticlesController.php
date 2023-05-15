<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Article\StoreRequest;
use App\Models\Article;
use App\Http\Requests\Article\UpdateRequest;

class ArticlesController extends Controller
{
    public function create(StoreRequest $request)
    {
        if ($request->hasFile('preview')) {
            $previewImagePath = "/storage/{$request->file('preview')->store('article/previews')}";
        }
//        $article = new Article();
//        $article->title = $request->input('title');
//        $article->body = $request->input('body');
//        $article->is_public = $request->has('is_public');
//        $article->preview_image = $previewImagePath;
//        $article->save();
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
