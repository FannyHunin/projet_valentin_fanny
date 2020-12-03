<?php

use App\Http\Controllers\AvatarController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {return view('auth.login');});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/all_users', [UserController::class, 'index']);
Route::get('/show_users/{id}', [UserController::class, 'show']);
Route::get('/delete_users/{id}', [UserController::class, 'destroy']);
Route::get('/edit_users/{id}', [UserController::class, 'edit']);
Route::post('/update_users/{id}', [UserController::class, 'update']);

Route::get('/create_avatar', [AvatarController::class, 'create']);
Route::post('/store_avatar', [AvatarController::class, 'store']);
Route::get('/delete_avatar/{id}', [AvatarController::class, 'destroy']);
Route::get('/edit_avatar/{id}', [AvatarController::class, 'edit']);
Route::post('/update_avatar/{id}', [AvatarController::class, 'update']);