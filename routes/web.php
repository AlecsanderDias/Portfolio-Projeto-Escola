<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', [LoginController::class, 'login']);
Route::post('/login', [LoginController::class, 'enter']);
Route::get('/home', [LoginController::class, 'home']);