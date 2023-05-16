<?php

namespace App\Http\Middleware\Articles;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsPublicMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $article = $request->route('article');

        if (!$article->isPublicMiddleware()) {
            //если маршрут содержит в себе префикс api
            if (str_contains($request->route()->getPrefix(), 'api')) {
                return response()->json(['message' => 'No access'], 403);
            }

            return abort(403);
        }

        return $next($request);
    }
}
