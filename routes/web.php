<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserPostController;
use App\Http\Controllers\DashboardController;


Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

//we use user:username to change the url to username instead of the id of the username 
Route::get('/user/{user:username}/posts', [UserPostController::class, 'index'])->name('user.posts');


Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::post('/posts', [PostController::class, 'store']);
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

// this uses route model binding the model here is the 'post'
Route::post('/posts/{post}/likes', [PostLikeController::class, 'store'])->name('posts.like');
Route::delete('/posts/{post}/likes', [PostLikeController::class, 'destroy'])->name('posts.like');