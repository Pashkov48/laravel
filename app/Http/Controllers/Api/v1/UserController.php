<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\LoginRequest;
use App\Models\Token;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function login(LoginRequest $request)
    {
        if (!Auth::attempt($request->validated())) {
            return response()->json([
                'message' => 'Invalid login data'
            ], 401);
        }
        //перед созанием токена удаляем старый, т.к. они остаются
        Token::query()->where('user_id', Auth::id())->delete();

        $token = Token::query()->create([
            'user_id' => Auth::id(),
            'token' => Str::random(50)
        ]);

        return [
            'token' => $token->token
        ];
    }
}
