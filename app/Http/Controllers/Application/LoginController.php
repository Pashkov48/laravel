<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use app\Http\Requests\Web\User\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('pages.login');
    }

    public function login(LoginRequest $request)
    {
        if (Auth::attempt($request->validated())) {
            return redirect()->route('hello');
        }

        return redirect()->back()->withErrors(['auth_error' => 'Incorrect credentials']);
    }

    public function logout()
    {
        Auth::logout();
        //метод очитстит сессию и инф о пользователе
        return redirect()->route('login.form');
    }
}
