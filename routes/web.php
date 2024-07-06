<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\LocationController;


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


  // Formulario de edición de una reseña
Route::get('/resenas/{review_id}/editar', [\App\Http\Controllers\ReviewController::class, 'editReviewForm'])
  ->middleware('auth')
  ->middleware('user_and_admin_allow')
  ->middleware('only_specific_user_allow')
  ->name('editReviewForm');

Route::post('/resenas/{review_id}/editar', [\App\Http\Controllers\ReviewController::class, 'editReviewAction'])
  ->middleware('auth')
  ->middleware('user_and_admin_allow')
  ->name('editReviewAction');

// Rutas relacionadas al blog de noticias
Route::get('/blog', [\App\Http\Controllers\HomeController::class, 'blogIndex'])
->name('blogIndex');

Route::get('/blog/{id}/leer_mas', [\App\Http\Controllers\HomeController::class, 'leerArticulo'])
  ->whereNumber('id');

Route::get('/chat', [\App\Livewire\ChatComponent::class, 'chatInbox'])
  ->middleware('auth')
  ->name('chatInbox');

Route::post('/start-chat/{chat_id?}', [\App\Livewire\ChatComponent::class, 'startChat'])
  ->middleware('auth')
  ->name('startChat');

Route::get('/nearby-places', [\App\Http\Controllers\PlaceController::class, 'nearbyPlaces'])
  ->middleware('auth')
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
  ->middleware('auth')
  ->name('showFavoritePlaces');

Route::post('/places/{placeId}/unfavorite', [\App\Http\Controllers\PlaceController::class, 'removeFavoritePlace'])
  ->middleware('auth')
  ->name('places.unfavorite');

Route::get('/ver-mapa', [\App\Http\Controllers\PlaceController::class, 'mapViewForm'])
  ->middleware('auth')
  ->name('mapViewForm');

Route::get('/categories/{category_id}/places',  [\App\Http\Controllers\PlaceController::class, 'getPlacesByCategory'])
  ->middleware('auth')
  ->name('getPlacesByCategory');

Route::get('/places/{place_id}/reviews', [\App\Http\Controllers\ReviewController::class, 'getReviewPlaces'])
  ->middleware('auth')
  ->name('getReviewPlaces');

Route::get('/editar-perfil', [\App\Http\Controllers\SessionController::class, 'editProfileForm'])
  ->name('editProfileForm');

Route::post('/editar-perfil', [\App\Http\Controllers\SessionController::class, 'editProfileAction'])
  ->name('editProfileAction');

Route::get('/administrar/lugares', [\App\Http\Controllers\HomeController::class, 'AdminPlacesView'])
  ->middleware('auth')
  ->middleware('only_admin_allow')
  ->name('AdminPlacesView');

Route::get('/lugares/{id}/eliminar', [\App\Http\Controllers\PlaceController::class, 'deletePlaceById'])
  ->middleware('auth')
  ->middleware('only_admin_allow')
  ->name('deletePlaceById');

Route::get('/administrar/categorias', [\App\Http\Controllers\CategoryController::class, 'getAllCategories'])
  ->middleware('auth')
  ->middleware('only_admin_allow')
  ->name('getAllCategories');

Route::post('/administrar/add/categorie', [\App\Http\Controllers\CategoryController::class, 'addCategorieAction'])
  ->middleware('auth')
  ->middleware('only_admin_allow')
  ->name('addCategorieAction');

Route::get('/categorias/{id}/editar', [\App\Http\Controllers\CategoryController::class, 'editCategorieForm'])
  ->middleware('auth')
  ->middleware('only_admin_allow')
  ->name('editCategorieForm');

Route::post('/categorias/{id}/editar', [\App\Http\Controllers\CategoryController::class, 'editCategorieAction'])
  ->middleware('auth')
  ->middleware('only_admin_allow')
  ->name('editCategorieAction');

Route::post('/lugares/{id}/autorizar', [\App\Http\Controllers\PlaceController::class, 'authorizePlace'])
  ->middleware('auth')
  ->middleware('only_admin_allow')
  ->name('authorizePlace');

Route::get('/lugares/{id}/editar', [\App\Http\Controllers\PlaceController::class, 'editPlaceForm'])
  ->middleware('auth')
  ->middleware('only_admin_allow')
  ->name('editPlaceForm');

Route::get('/administrar/usuarios', [\App\Http\Controllers\HomeController::class, 'AdminUsersView'])
  ->middleware('auth')
  ->middleware('only_admin_allow')
  ->name('AdminUsersView');

Route::post('/administrar/usuarios/{userId}/bloquear-desbloquear', [\App\Http\Controllers\UserController::class, 'toggleBlock'])
  ->middleware('auth')
  ->middleware('only_admin_allow')
  ->name('toggleBlock');

// Rutas para el manejo de las notificaciones

Route::get('/notificaciones', [App\Http\Controllers\NotificationController::class, 'index'])
  ->middleware('auth')
  ->name('notificationsView');

Route::get('/notificaciones/leer/{id}', [App\Http\Controllers\NotificationController::class, 'markAsRead'])
  ->middleware('auth')
  ->name('notificationsRead');

Route::post('/guardar-ubicacion', [LocationController::class, 'store'])->name('saveLocation');



require __DIR__.'/auth.php';
