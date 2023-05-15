<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\v1\Articles\UpdateOrCreateRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Articles\StoreArticleRequest;
use App\Http\Requests\Api\Articles\UpdateArticleRequest;
use App\Http\Resources\Articles\ArticleResourse;
use App\Http\Resources\Articles\MinifiedArticleResource;
use App\Models\Article;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.token')->only(['show']);
    }

    public function index()
    {
        return MinifiedArticleResource::collection(
            Article::query()->where('is_public', true)->get()
        );
    }


    public function store(StoreArticleRequest $request)
    {
        if ($request->hasFile('preview_image')) {
            $previewImagePath = "/storage/{$request->file('preview_image')->store('article/previews')}";
        }
        //создаем запись
        $article = Article::query()->create([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'preview_image' => $previewImagePath ?? NULL,
            'is_public' => $request->boolean('is_public'),
        ]);
        //возвращаем то что созадали
        //так же необходимо вернуть ошибку(точнее "создано", поэтому response->json
        return response()->json($this->show($article))->setStatusCode(201, 'Post creates');
    }


    public function show(Article $article)
    {
        return new ArticleResourse($article);

    }


    public function update(UpdateArticleRequest $request, Article $article)
    {
        $article->update($request->validated());
        return $this->show($article);
    }


    public function destroy(Article $article)
    {
        return [
            'status' => $article->delete()
        ];
    }

}
