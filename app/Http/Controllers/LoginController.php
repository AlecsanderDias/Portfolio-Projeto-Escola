<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function enter() {
        return view('login.loginForm');
    }

    public function login(FormRequest $request) {
        $resultado[] = $request->registration;
        $resultado[] = $request->password;
        $user = new User($request->attributes());
        dd($user);
        return view('dashboard.home', ['result' => $resultado]);
    }

    public function logout() {

    }

    public function home() {
        return view('dashboard.home');
    }

}
