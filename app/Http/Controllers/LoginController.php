<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function enter() {
        return view('login.loginForm');
    }

    public function login(FormRequest $request) {
        if(Auth::attempt(['registration' => $request->registration, 'password' => $request->password])) {
            return redirect('/dashboard');
        }
        return back()->withErrors(['result' => 'Dados inseridos inválidos']);
    }

    public function logout() {
        Auth::logout();
        return redirect('/login');
    }

    public function home() {
        return view('dashboard.home');
    }

}
