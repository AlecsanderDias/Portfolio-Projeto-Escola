<?php

use App\Http\Controllers\GradeController;
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
Route::resource('/users', UserInformationController::class)->except('show')->middleware('auth');
Route::resource('/schoolClasses', SchoolClassController::class)->except('show')->middleware('auth');
Route::resource('/subjects', SubjectController::class)->except('show')->middleware('auth');
Route::resource('/grades', GradeController::class)->except('show')->middleware('auth');