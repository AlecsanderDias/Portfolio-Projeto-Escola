<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

Route::get('/login', [LoginController::class, 'enter']);
Route::post('/login', [LoginController::class, 'login']);
Route::get('/home', [LoginController::class, 'home']);