<?php

namespace App\Providers;

use App\Http\Resources\Articles\MinifiedArticleResource;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        MinifiedArticleResource::withoutWrapping();
    }
}