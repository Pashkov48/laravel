<?php

namespace App\Http\Resources\Articles;

use App\Http\Resources\Comments\CommentResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResourse extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'body' => $this->body,
            'image' => $this->preview_image,
            'date' => $this->created_at,
            'comments' => CommentResource::collection($this->comments)
        ];
    }
}
