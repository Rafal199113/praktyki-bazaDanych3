<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::middleware('Auth')->group(function () {
    Route::resource('account', AccountController::class)->middleware(['auth']);
    Route::get('/auth/dashboard/logout', [LoginController::class,'logout'])->name('auth.logout');
    Route::get('/auth/dashboard', [LoginController::class,'dashboard'])->name('auth.dashboard');
});
Route::get('/auth/login', [LoginController::class, 'login'])->name('login');
Route::post('/auth', [LoginController::class,'authenticate'])->name('auth.login');
Route::get('/', [AccountController::class,'home'])->name('home');


