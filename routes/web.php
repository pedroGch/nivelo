<?php

use Illuminate\Support\Facades\Route;



// Ruta de landing page
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])
   ->name('home');

// Ruta suscripción
Route::post('/', [\App\Http\Controllers\SubscriberController::class, 'subscribeAction'])
   ->name('subscribeAction');

// Ruta de la página Acerca de
Route::get('/acerca-de', [\App\Http\Controllers\HomeController::class, 'about'])
   ->name('about');

// Ruta de la página de términos y condiciones
Route::get('/terminos-y-condiciones', [\App\Http\Controllers\HomeController::class, 'terms'])
   ->name('terms');

// Ruta de landing page
// Route::get('/', [\App\Http\Controllers\SessionController::class, 'loginForm'])
// ->name('login');

// Rutas de login y logout
Route::get('/iniciar-sesion', [\App\Http\Controllers\SessionController::class, 'loginForm'])
  ->name('login');

Route::post('/iniciar-sesion', [\App\Http\Controllers\SessionController::class, 'loginAction'])
  ->name('loginAction');

Route::post('/cerrar-sesion', [\App\Http\Controllers\SessionController::class, 'logoutAction'])
  ->name('logoutAction')
  ->middleware('auth');

Route::get('/sesion-google', [\App\Http\Controllers\SessionController::class, 'loginWithGoogle'])
  ->name('loginGoogle');

// Rutas de perfil de usuario
Route::get('/mi-perfil', [\App\Http\Controllers\UserController::class, 'userProfile'])
  ->middleware('auth')
  ->middleware('user_and_admin_allow')
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
  ->middleware('user_and_admin_allow')
  ->name('categories');

  Route::get('/buscar-lugar', [\App\Http\Controllers\PlaceController::class, 'searchPlaces'])
  ->middleware('auth')
  ->middleware('user_and_admin_allow')
  ->name('searchPlaces');

Route::get('/categorias/{category_id}', [\App\Http\Controllers\CategoryController::class, 'categoryDetail']) //{id}
  ->middleware('auth')
  ->middleware('user_and_admin_allow')
  ->name('categoryDetail');

Route::get('/categorias/{category_id}/{place_id}', [\App\Http\Controllers\PlaceController::class, 'placeDetail']) //{id}
  ->middleware('auth')
  ->middleware('user_and_admin_allow')
  ->name('placeDetail')
  ->where(['category_id' => '[0-9]+', 'place_id' => '[0-9]+']);

Route::get('/categorias/{category_id}/{place_id}/{review_id}', [\App\Http\Controllers\ReviewController::class, 'reviewDetail'])
  ->middleware('auth')
  ->middleware('user_and_admin_allow')
  ->name('reviewDetail')
  ->where(['category_id' => '[0-9]+', 'place_id' => '[0-9]+', 'review_id' => '[0-9]+']); //{id}


  // Formulario de carga de un nuevo lugar
Route::get('/nuevo-lugar', [\App\Http\Controllers\PlaceController::class, 'addPlaceForm'])
  ->middleware('auth')
  ->middleware('user_and_admin_allow')
  ->name('addPlaceForm');

Route::post('/nuevo-lugar', [\App\Http\Controllers\PlaceController::class, 'addPlaceAction'])
  ->middleware('auth')
  ->middleware('user_and_admin_allow')
  ->name('addPlaceAction');


  // Formulario de carga de una nueva reseña
Route::get('/categorias/{category_id}/{place_id}/nueva-resena', [\App\Http\Controllers\ReviewController::class, 'addReviewForm'])
  ->middleware('auth')
  ->middleware('user_and_admin_allow')
  ->name('addReviewForm');

Route::post('/categorias/nueva-resena', [\App\Http\Controllers\ReviewController::class, 'addReviewAction'])
  ->middleware('auth')
  ->middleware('user_and_admin_allow')
  ->name('addReviewAction');


// Rutas relacionadas al blog de noticias
Route::get('/blog', [\App\Http\Controllers\HomeController::class, 'blogIndex'])
->name('blogIndex');

Route::get('/blog/{id}/leer_mas', [\App\Http\Controllers\HomeController::class, 'leerArticulo'])
  ->whereNumber('id');

Route::get('/chat', [\App\Livewire\ChatComponent::class, 'chatInbox'])
  ->name('chatInbox');

Route::post('/start-chat/{chat_id?}', [\App\Livewire\ChatComponent::class, 'startChat'])
  ->name('startChat');

Route::get('/nearby-places', [\App\Http\Controllers\PlaceController::class, 'nearbyPlaces'])
  ->name('nearbyPlaces');


// Rutas relacionadas al panel de administración

Route::get('/dashboard', [\App\Http\Controllers\HomeController::class, 'dashboardAdmin'])
  ->middleware('auth')
  ->middleware('only_admin_allow')
  ->name('dashboard');

Route::get('/dashboard/administrar-blog', [\App\Http\Controllers\HomeController::class, 'blogAdmin'])
  ->middleware('auth')
  ->middleware('only_admin_allow')
  ->name('blogAdmin');

Route::get('/dashboard/administrar-resenas', [\App\Http\Controllers\HomeController::class, 'reviewsAdmin'])
  ->middleware('auth')
  ->middleware('only_admin_allow')
  ->name('reviewsAdmin');

// Rutas de administración de noticias

Route::get('/blog/nueva-noticia', [\App\Http\Controllers\HomeController::class, 'addPostForm'])
  ->middleware('auth')
  ->middleware('only_admin_allow')
  ->name('addPostForm');

Route::post('/blog/nueva-noticia', [\App\Http\Controllers\HomeController::class, 'addPostAction'])
  ->middleware('auth')
  ->middleware('only_admin_allow')
  ->name('addPostAction');

Route::get('/blog/{id}/editar', [\App\Http\Controllers\HomeController::class, 'editPostForm'])
  ->middleware('auth')
  ->middleware('only_admin_allow')
  ->name('editPostForm');

Route::post('/blog/{id}/editar', [\App\Http\Controllers\HomeController::class, 'editPostAction'])
  ->middleware('auth')
  ->middleware('only_admin_allow')
  ->name('editPostAction');

Route::get('/blog/{id}/eliminar', [\App\Http\Controllers\HomeController::class, 'deletePostAction'])
  ->middleware('auth')
  ->middleware('only_admin_allow')
  ->name('deletePostAction');


// Rutas de administración de reseñas

Route::get('/dashboard/administrar-resenas/{id}/aprobar', [\App\Http\Controllers\HomeController::class, 'approveReviewAction'])
  ->middleware('auth')
  ->middleware('only_admin_allow')
  ->name('approveReviewAction');

Route::get('/dashboard/administrar-resenas/{id}/ocultar', [\App\Http\Controllers\HomeController::class, 'hideReviewAction'])
  ->middleware('auth')
  ->middleware('only_admin_allow')
  ->name('hideReviewAction');

Route::post('/places/{placeId}/favorite', [\App\Http\Controllers\PlaceController::class, 'addFavoritePlace'])
  ->middleware('auth')
  ->name('places.favorite');

Route::get('/mis-lugares-favoritos', [\App\Http\Controllers\PlaceController::class, 'showFavoritePlaces'])
  ->name('showFavoritePlaces');
