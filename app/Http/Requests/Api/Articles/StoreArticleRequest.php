<?php

namespace App\Http\Requests\Api\Articles;

use App\Http\Requests\Api\ApiRequest;

class StoreArticleRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'body' => ['string', 'max:1000'],
            'preview' => ['image', 'mimes:png,svg'],
            'is_public' => ['required', 'boolean']
        ];
    }
}
