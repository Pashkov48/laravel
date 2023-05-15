<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            "name" => ['required'],
            "email" => ['required'],
            "password" => ['required'],
            "password_confirmation" =>['required']
        ];
    }
}
