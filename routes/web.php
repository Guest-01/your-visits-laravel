<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

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

Route::get('/', [MainController::class, 'index'])->name('index');

Route::get('/signup', [MainController::class, 'signup'])->name('signup');
Route::post('/signup', [MainController::class, 'signup_post']);

Route::get('/login', [MainController::class, 'login'])->name('login');
Route::post('/login', [MainController::class, 'login_post']);

Route::post('/logout', [MainController::class, 'logout'])->name('logout');