<?php

use Illuminate\Support\Facades\Route;



// Ruta de landing page
// Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])
//   ->name('home');

// Ruta de landing page
Route::get('/', [\App\Http\Controllers\SessionController::class, 'loginForm'])
->name('login');

// Rutas de login y logout
Route::get('/iniciar-sesion', [\App\Http\Controllers\SessionController::class, 'loginForm'])
  ->name('login');

Route::post('/iniciar-sesion', [\App\Http\Controllers\SessionController::class, 'loginAction'])
  ->name('loginAction');

Route::post('/cerrar-sesion', [\App\Http\Controllers\SessionController::class, 'logoutAction'])
  ->name('logoutAction');

Route::get('/sesion-google', [\App\Http\Controllers\SessionController::class, 'loginWithGoogle'])
  ->name('loginGoogle');

// Rutas de perfil de usuario
Route::get('/mi-perfil', [\App\Http\Controllers\UserController::class, 'userProfile'])
  ->middleware('auth')
  ->name('userProfile');


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

  Route::get('/buscar-lugar', [\App\Http\Controllers\PlaceController::class, 'searchPlaces'])
  ->middleware('auth')
  ->name('searchPlaces');

Route::get('/categorias/{category_id}', [\App\Http\Controllers\CategoryController::class, 'categoryDetail']) //{id}
  ->middleware('auth')
  ->name('categoryDetail');

Route::get('/categorias/{category_id}/{place_id}', [\App\Http\Controllers\PlaceController::class, 'placeDetail']) //{id}
  ->middleware('auth')
  ->name('placeDetail')
  ->where(['category_id' => '[0-9]+', 'place_id' => '[0-9]+']);

Route::get('/categorias/{category_id}/{place_id}/{review_id}', [\App\Http\Controllers\ReviewController::class, 'reviewDetail'])
  ->middleware('auth')
  ->name('reviewDetail')
  ->where(['category_id' => '[0-9]+', 'place_id' => '[0-9]+', 'review_id' => '[0-9]+']); //{id}


  // Formulario de carga de un nuevo lugar
Route::get('/nuevo-lugar', [\App\Http\Controllers\PlaceController::class, 'addPlaceForm'])
  ->middleware('auth')
  ->name('addPlaceForm');

Route::post('/nuevo-lugar', [\App\Http\Controllers\PlaceController::class, 'addPlaceAction'])
  ->middleware('auth')
  ->name('addPlaceAction');


  // Formulario de carga de una nueva reseña
Route::get('/categorias/{category_id}/{place_id}/nueva-resena', [\App\Http\Controllers\ReviewController::class, 'addReviewForm'])
  ->middleware('auth')
  ->name('addReviewForm');

Route::post('/categorias/nueva-resena', [\App\Http\Controllers\ReviewController::class, 'addReviewAction'])
  ->middleware('auth')
  ->name('addReviewAction');

Route::get('/blog', [\App\Http\Controllers\HomeController::class, 'blogIndex'])
->name('blogIndex');

Route::get('/blog/{id}/leer_mas', [\App\Http\Controllers\HomeController::class, 'leerArticulo'])
  ->whereNumber('id');
