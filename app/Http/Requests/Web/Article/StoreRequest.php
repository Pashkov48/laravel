<?php

namespace app\Http\Requests\Web\Article;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'body' => ['string', 'max:1000'],
            'preview' => ['image', 'mimes:png,svg']
        ];
    }
}
