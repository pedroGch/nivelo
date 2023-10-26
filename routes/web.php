<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [\App\Http\Controllers\SessionController::class, 'loginForm'])
  ->name('login');
Route::get('/signup', [\App\Http\Controllers\SessionController::class, 'signupForm'])
  ->name('signup');
  Route::get('/about-you', [\App\Http\Controllers\SessionController::class, 'aboutYou'])
  ->name('aboutYou');
