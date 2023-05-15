<?php

use App\Http\Controllers\Api\v1\ArticlesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\UserController;

Route::apiResources([
    'articles' => ArticlesController::class,
]);

Route::controller(UserController::class)->group(function (){
   Route::post('login', 'login');
});



