<?php

use Illuminate\Support\Facades\Route;



// Ruta de landing page
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])
  ->name('home');

// Rutas de login y logout
Route::get('/iniciar-sesion', [\App\Http\Controllers\SessionController::class, 'loginForm'])
  ->name('login');
Route::post('/iniciar-sesion', [\App\Http\Controllers\SessionController::class, 'loginAction'])
  ->name('loginAction');
Route::post('/cerrar-sesion', [\App\Http\Controllers\SessionController::class, 'logoutAction'])
  ->name('logoutAction');
Route::get('/sesion-google', [\App\Http\Controllers\SessionController::class, 'loginWithGoogle'])
  ->name('loginGoogle');

  // Rutas de registro
Route::get('/registrate', [\App\Http\Controllers\SessionController::class, 'signupForm'])
  ->name('signup');
Route::post('/registrate', [\App\Http\Controllers\SessionController::class, 'signupAction'])
  ->name('signupAction');
Route::get('/sobre-vos', [\App\Http\Controllers\SessionController::class, 'aboutYouForm'])
  ->name('aboutYouForm');
Route::post('/sobre-vos', [\App\Http\Controllers\SessionController::class, 'aboutYouAction'])
  ->name('aboutYouAction');
Route::get('/google-callback', [\App\Http\Controllers\SessionController::class, 'googleCallback'])
  ->name('googleCallback');

  // Rutas de la aplicación (se requiere estar logueado)
Route::get('/categorias', [\App\Http\Controllers\CategoryController::class, 'index'])
  ->middleware('auth')
  ->name('categories');

