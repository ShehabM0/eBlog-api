<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/signup', [AuthController::class, "signupPage"]);
Route::get('/login', [AuthController::class, "loginPage"])->name('login');

Route::post('/signup', [AuthController::class, "signup"]);
Route::post('/logout', [AuthController::class, "logout"]);
Route::post('/login', [AuthController::class, "login"]);

Route::post('/post/create', [PostController::class, "create"]);
Route::delete('/post/delete', [PostController::class, "delete"]);
Route::put('/post/edit', [PostController::class, "edit"]);
Route::get('/post/{id}', [PostController::class, "show"]);

Route::get('/myposts', [PostController::class, "userPosts"]);
Route::get('/', [PostController::class, "homepage"]);