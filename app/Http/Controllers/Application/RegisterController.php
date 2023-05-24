<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\User\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('pages.register');
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        //при создании записи в БД можно не создавать самому масиив,
        //а использовать метод validate() который возвращает провалилидированные данные.
        //хешируем пароль(класс в Лалавеле, в  php password_hash)
        $data['password'] = Hash::make($data['password']);
        User::create($data);

        return redirect()->route('login.form')->with('success', 'Register success');
    }
}
