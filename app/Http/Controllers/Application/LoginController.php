<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
//        $user = User::whereEmail($request->input('email'))->first();
//        if ($user) {
//            if (Hash::check($request->input('password'), $user->password)) {
//                Auth::login($user, true);
//                //флаг true заменяет чек бокс запомнить пользователя и в БД заносится remember_token
//                return redirect()->route('hello');
//            }
//        }
    }

    public function logout()
    {
        Auth::logout();
        //метод очитстит сессию и инф о пользователе
        return redirect()->route('login.form');
    }
}
