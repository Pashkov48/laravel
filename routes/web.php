<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Application\PagesController;
use App\Http\Controllers\Application\ArticlesController;
use App\Http\Controllers\Application\RegisterController;
use App\Http\Controllers\Application\LoginController;

Route::controller(PagesController::class)->group(function () {
    Route::get('/', 'hello')->name('hello');
    Route::get('/home', 'home')->name('home');
    Route::get('/articles', 'articles')->name('articles');
    Route::get('/articles/create', 'createArticleForm')
        ->middleware('auth')
        ->name('article.page.add');
    Route::get('/articles/{article}', 'showArticle')
        ->middleware('article.is_public')
        ->name('article');
    Route::get('/articles/{article}/edit', 'updateArticleForm')->name('article.page.edit');
});

Route::controller(ArticlesController::class)->middleware('auth')->group(function () {
    Route::post('/articles/create', 'create')->name('articles.create');
    Route::post('/articles/{article}/update', 'update')->name('articles.update');
    Route::post('/articles/{article}/delete', 'delete')->name('article.delete');
});

Route::controller(RegisterController::class)->middleware('guest')->group(function () {
    Route::get('/register', 'index')->name('register.form');
    Route::post('/register', 'register')->name('register.action');
});

Route::controller(LoginController::class)->middleware('guest')->group(function () {
    Route::get('/login', 'index')->name('login.form');
    Route::post('/login', 'login')->name('login.action');
    Route::post('/logout', 'logout')->name('logout.action')->withoutMiddleware('guest');
});















