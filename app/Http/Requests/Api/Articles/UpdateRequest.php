<?php

namespace App\Http\Requests\Api\Articles;

use App\Http\Requests\Api\ApiRequest;

class UpdateRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'title' => ['string', 'max:255'],
            'body' => ['string', 'max:1000'],
            'is_public' => ['boolean'],
            'preview_image' => ['string']
        ];
    }
}
