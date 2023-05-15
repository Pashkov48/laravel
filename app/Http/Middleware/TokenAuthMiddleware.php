<?php

namespace App\Http\Middleware;

use App\Models\Token;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class TokenAuthMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        //получаем таким способом заголовок Auth
        $token = $request->bearerToken('Authorization', '');
        //в БД ищем такой токен
        $token = Token::whereToken($token)->first();

        //если не находим токен , то сообщение
        if(is_null($token)){
            return response()->json([
                'message' => 'Auth error'
            ],401);
        }
        //устанавливаем в сесслию пользователя
        Auth::setUser($token->user);
        return $next($request);
    }
}
