<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/posts', [
    PostController::class,
    'index'
])->name('posts.index')->middleware('auth');

Route::get('/posts/create', [
    PostController::class,
    'create'
])->name('posts.create')->middleware('auth');

Route::post('/posts', [
    PostController::class,
    'store'
])->name('posts.store')->middleware('auth');

Route::get('/posts/{post}', [
    PostController::class,
    'show'
])->name('posts.show')->middleware('auth');

Route::get('/users', [
    UserController::class,
    'index'
])->name('users.index')->middleware('auth');

Route::get('/users/{user}', [
    UserController::class,
    'show'
])->name('users.show')->middleware('auth');
