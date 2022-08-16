<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

// Blog
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('posts');

// Admin Panel
Route::get('/admin', [App\Http\Controllers\Admin\MainController::class, 'index'])->name('admin');
Route::get('/user/{id}', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('user');
