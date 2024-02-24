<?php

use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create.blade.php something great!
|
*/

Route::get('/', [PostController::class, 'index'])
    ->name('home');

Route::get('/posts/create', [PostController::class, 'create'])->middleware('auth');
Route::get('/posts/{post:slug}', [PostController::class, 'show'])
    ->name('posts');
Route::post('/posts', [PostController::class, 'store'])->middleware('auth');
Route::put('/posts/{post:slug}', [PostController::class, 'update']);
Route::delete('/posts/{post:slug}', [PostController::class, 'destroy']);
Route::get('posts/{post:slug}/edit', [PostController::class, 'edit']);

Route::post('/posts/{post:slug}/comment', [PostCommentController::class, 'store']);
Route::get('/register', [RegisterController::class, 'show'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

Route::post('/logout', [SessionsController::class, 'destroy'])->middleware('auth');

Route::get('/login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('/login', [SessionsController::class, 'store'])->middleware('guest');
