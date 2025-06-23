<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

Route::get('', function () {
    return redirect(route('products.index'));
});

Route::middleware('auth')->group(function() {
    Route::resource('products', ProductController::class);
});

Route::get('/register', [UserController::class, 'register'])->name('register.form');
Route::post('/register', [UserController::class, 'store'])->name('register');

Route::get('/login', [UserController::class, 'login'])->name('login.form');
Route::post('/login', [UserController::class, 'authenticate'])->name('login');

Route::post('/logout', [UserController::class, 'logout'])->name('logout');