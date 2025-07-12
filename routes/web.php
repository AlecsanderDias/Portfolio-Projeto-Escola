<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\SchoolClassController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UserInformationController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

Route::get('/login', [LoginController::class, 'enter'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/dashboard', [LoginController::class, 'home'])->middleware('auth')->name('home');
Route::resource('/user', UserInformationController::class)->except('show')->middleware('auth');
Route::resource('/schoolClass', SchoolClassController::class)->except('show')->middleware('auth');
Route::resource('/subject', SubjectController::class)->except('show')->middleware('auth');