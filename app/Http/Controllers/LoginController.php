<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login() {
        return view('login.loginForm');
    }

    public function enter(FormRequest $request) {
        $resultado[] = $request->registration;
        $resultado[] = $request->password;
        return view('dashboard.home', ['result' => $resultado]);
    }

    public function logout() {

    }

    public function home() {

    }

}
