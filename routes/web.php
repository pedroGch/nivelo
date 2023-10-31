<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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

// Rutas de login y registro
Route::get('/', [\App\Http\Controllers\SessionController::class, 'loginForm'])
  ->name('login');
Route::post('/', [\App\Http\Controllers\SessionController::class, 'loginAction'])
  ->name('loginAction');


Route::get('/registrate', [\App\Http\Controllers\SessionController::class, 'signupForm'])
  ->name('signup');

Route::post('/registrate', [\App\Http\Controllers\SessionController::class, 'signupAction'])
  ->name('signupAction');


Route::get('/sobre-vos', [\App\Http\Controllers\SessionController::class, 'aboutYouForm'])
  ->name('aboutYouForm');
Route::post('/sobre-vos', [\App\Http\Controllers\SessionController::class, 'aboutYouAction'])
  ->name('aboutYouAction');
// Route::get('/crear_cuenta', [\App\Http\Controllers\SesionController::class, 'crear_cuenta']);
// Route::post('/validar_usuario', [\App\Http\Controllers\SesionController::class, 'validar_usuario']);
// Route::post('/cerrar_sesion', [\App\Http\Controllers\SesionController::class, 'cerrar_sesion']);

Route::get('/login-google', function () {
  return Socialite::driver('google')->redirect();
});

Route::get('/google-callback', function () {
  $user = Socialite::driver('google')->user();
  dd($user);
  // $user->token
});


Route::get('/categorias', [\App\Http\Controllers\CategoryController::class, 'index'])
  ->name('categories');
