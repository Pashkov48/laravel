<?php

namespace App\Http\Requests\Api\Comments;

use App\Http\Requests\Api\ApiRequest;

class StoreRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'username' => ['required', 'string', 'max:50'],
            'body' => ['required', 'string', 'max:255']
        ];
    }
}
