<?php



use App\Http\Controllers\Admin\Users\UserController;
use App\Http\Controllers\Admin\Users\UsersController;

use App\Http\Controllers\Admin\Posts\PostController;
use App\Http\Controllers\Admin\Posts\PostsController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

// Blog
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('blog');

// Admin Panel
Route::get('/admin/main', [App\Http\Controllers\Admin\MainController::class, 'index'])->name('admin');

// Users
Route::group(['namespace' => 'App\Http\Controllers\Admin\Users', 'prefix' => 'admin'], function() {
    Route::get( 'users',                [UsersController::class,'index'])->name('users');
    Route::get( 'user/create',          [UserController::class, 'create'])->name('create_user');
    Route::get( 'user/edit/{user_id}',  [UserController::class, 'index'])->name('user');
    Route::post('user/save',            [UserController::class, 'save'])->name('save_user');
});

// Posts
Route::group(['namespace' => 'App\Http\Controllers\Admin\Posts', 'prefix' => 'admin'], function() {
    Route::get( 'posts',                [PostsController::class, 'index'])->name('posts');
    Route::get( 'post/create',          [PostController::class,  'create'])->name('create_post');
    Route::get( 'post/edit/{post_id}',  [PostController::class, 'index'])->name('post');
    Route::post('post/save',            [PostController::class, 'save'])->name('save_post');
    Route::post('post/upload',          [PostController::class, 'fileUploadPost'])->name('post_image_upload');
    Route::get( 'post/block/{post_id}', [PostController::class, 'block'])->name('post_block');
    Route::get( 'post/unblock/{post_id}', [PostController::class, 'unblock'])->name('post_unblock');
});
