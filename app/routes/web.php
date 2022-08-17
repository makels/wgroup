<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

// Blog
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('blog');

// Admin Panel
Route::get('/admin/main', [App\Http\Controllers\Admin\MainController::class, 'index'])->name('admin');

// Users
Route::get('/admin/users', [App\Http\Controllers\Admin\Users\UsersController::class, 'index'])->name('users');
Route::get('/admin/user/{user_id}', [App\Http\Controllers\Admin\Users\UserController::class, 'index'])->name('user');
Route::get('/admin/user/create', [App\Http\Controllers\Admin\Users\UserController::class, 'create'])->name('create_user');

// Posts
Route::get('/admin/posts', [App\Http\Controllers\Admin\Posts\PostsController::class, 'index'])->name('posts');
Route::get('/admin/post/{post_id}', [App\Http\Controllers\Admin\Posts\PostController::class, 'index'])->name('post');
Route::get('/admin/post/create', [App\Http\Controllers\Admin\Posts\PostController::class, 'create'])->name('create_post');
