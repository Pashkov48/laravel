<?php

namespace App\Http\Requests\Api\Articles;

use App\Http\Requests\Api\ApiRequest;

class UpdateArticleRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string', 'max:1000'],
            'is_public' => ['required', 'boolean'],
            'preview_image' => ['required', 'string']
        ];
    }
}
