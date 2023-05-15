<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Comments\StoreRequest;
use App\Models\Article;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function create(StoreRequest $request, Article $article)
    {
        //здесь создастся комментарий и автоматически занесется article_id
        //это работает если добавлены связи и отношения
        $comment = $article->comments()->create($request->validated());
        return response()->json([
            'user' => $comment->username,
            'body' => $comment->body
        ], 201);
    }
}
