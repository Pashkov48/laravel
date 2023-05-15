<?php

namespace App\Http\Requests\Api\User;

use App\Http\Requests\Api\ApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'email'=> ['required', 'email'],
            'password'=> ['required']
        ];
    }
}
