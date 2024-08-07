<?php

namespace App\Http\Controllers;

use App\Events\PlaceCreated;
use App\Models\Category;
use App\Models\Place;
use App\Models\Review;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\UserMoreInfo;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PlaceController extends Controller
{
  /**
  * Retorna la vista de detalle de un lugar
  * @param int $id
  * @return \Illuminate\View\View
  */
  public function placeDetail(int $category_id, int $place_id)
  {
    $status = Auth::user()->status;
    $user = Auth::user();
    $place = Place::findOrFail($place_id);
    $scores = Review::where('place_id', $place_id)->get('score');

    ($scores->count() > 0) ? $totalPlaceScore = $scores->sum('score') : $totalPlaceScore = 3;
    $averagePlaceScore = $totalPlaceScore / ($scores->count() > 0 ? $scores->count() : 1);

    $averagePlaceScore = max(1, min(5, $averagePlaceScore));

    $fiveStarReviews = Review::where('place_id', $place_id)->where('score', 5)->count();

    $notablePlace = false;
    if($fiveStarReviews == 10) {
      $notablePlace = true;
    }

    $favorites = $user->favoritePlaces;
    $placeExist = false;

    foreach ($favorites as $aPlace) {
      if($aPlace->place_id  == $place_id){
        $placeExist = true;
      }
    }

    return view('places.place-detail', [
      "place" => Place::findOrFail($place_id),
      "category" => Category::findOrFail($category_id),
      "src_information" => Place::findOrFail($place_id)->srcInformation,
      "uploaded_from_id" => Place::findOrFail($place_id)->uploadedFrom,
      "reviews" => Review::where('place_id', $place_id)
                          ->where('status', 'approved')
                          ->orderBy('created_at', 'desc')
                          ->get(),
      "averagePlaceScore" => $averagePlaceScore,
      "notablePlace" => $notablePlace,
      "status" => $status,
      "placeExist" => $placeExist,
    ]);
  }


  /**
   * Retorna la vista del formulario de carga de un nuevo lugar
   * @return \Illuminate\View\View
   */
  public function addPlaceForm()
  {
    $addPlaceActive = true;

    return view('places.add-place-form', [
      "categories" => Category::all(),
      "addPlaceActive" => $addPlaceActive,
    ]);
  }


  /**
   * Retorna la vista del formulario de carga de un nuevo lugar
   * @return \Illuminate\View\View
   */
  public function addPlaceAction(Request $request)
  {
    $userId = Auth::id();

    $request->validate(Place::$rules, Place::$errorMessages);

    if ($request->hasFile('main_img')) {
      $data = $request->file('main_img')->store('places', 'public');
    }

    $latitude = $request->latitude;
    $longitude = $request->longitude;

    // Verificar si ya existe un lugar con las mismas coordenadas
    $existingPlace = Place::where('latitude', $latitude)->where('longitude', $longitude)->first();

    if ($existingPlace) {
        return redirect()->back()->with('status.message', 'Ya existe un lugar con las mismas coordenadas')->with('status.type', 'warning');
    }

    $newPlace = Place::Create([
      'name' => $request->place_name,
      'address' => $request->addressPlace,
      'city' => $request->cityPlace,
      'province' => $request->provincePlace,
      'description' => $request->place_description,
      'main_img' => $data,
      'alt_main_img' => 'imagen subida por el usuario '.$userId,
      'access_entrance' => $request->acces_entrance === 'on',
      'assisted_access_entrance' => $request->asisted_entrance === 'on',
      'internal_circulation' => $request->internal_circulation === 'on',
      'bathroom' => $request->bathroom === 'on',
      'adult_changing_table' => $request->adult_changing_table === 'on',
      'parking' => $request->parking === 'on',
      'elevator' => $request->elevator === 'on',
      'src_info_id' => 2,
      'review_id' => null,
      'category_id' => $request->category,
      'uploaded_from_id' => $userId,
      'latitude'=> $request->latitude,
      'longitude'=> $request->longitude,
      'status' => 0, // Estado inicial del lugar: pendiente de aprobación
    ]);

    $placeId = $newPlace->place_id;
    return redirect()
      ->route('addReviewForm', [
        'category_id' => $request->category,
        'place_id' => $placeId,])
      ->with('status.message', '¡El lugar fue cargado correctamente!, ahora podés calificarlo.');
  }

    /**
   * Retorna una vista con los resultados
   * @return \Illuminate\View\View
   */
  public function searchPlaces (Request $request)
  {
    $searchPlace = $request->buscar;
    $categoryId = $request->category_id;

    $query = Place::query();

    // Filtra los lugares que estén aprobados
    $query->where('status', true);

    // Agrupa las condiciones de búsqueda manual
    if (!is_null($searchPlace)) {
      $query = $query->where(function ($query) use ($searchPlace) {
          $query->where('name', 'LIKE', "%$searchPlace%")
              ->orWhere('address', 'LIKE', "%$searchPlace%")
              ->orWhere('city', 'LIKE', "%$searchPlace%")
              ->orWhere('province', 'LIKE', "%$searchPlace%");
      });
    }
    if (!is_null($categoryId)) {
      $query->where('category_id', $categoryId);
    }

    // Primero, verifica si el parámetro 'features' está presente en la solicitud
    if ($request->has('features')) {
      $features = $request->input('features');

      // Luego, para cada característica conocida, verifica si está en el array de 'features' y aplica el filtro
      if (in_array('access_entrance', $features)) {
          $query->where('access_entrance', true);
      }

      if (in_array('assisted_access_entrance', $features)) {
          $query->where('assisted_access_entrance', true);
      }

      if (in_array('internal_circulation', $features)) {
          $query->where('internal_circulation', true);
      }

      if (in_array('bathroom', $features)) {
          $query->where('bathroom', true);
      }

      if (in_array('adult_changing_table', $features)) {
          $query->where('adult_changing_table', true);
      }

      if (in_array('parking', $features)) {
          $query->where('parking', true);
      }

      if (in_array('elevator', $features)) {
          $query->where('elevator', true);
      }
    }

    $placesResult = $query->paginate(8);

    // Obtener los puntajes promedio para cada lugar y agregarlos al array $placesResult
    foreach ($placesResult as $place) {
      $totalScores = Review::where('place_id', $place->place_id)->pluck('score')->toArray();

      if (count($totalScores) > 0) {
        $totalScore = array_sum($totalScores);
        $averageScore = $totalScore / count($totalScores);
        $averageScore = max(1, min(5, $averageScore));
        $place->totalAverageScore = $averageScore;
      } else {
        $place->totalAverageScore = 3; // Otra opción si no hay reseñas
      }

      // Verificar si el lugar es destacado
      $fiveStarReviews = Review::where('place_id', $place->place_id)->where('score', 5)->count();

      $place->notablePlace = false;
      if($fiveStarReviews == 10) {
        $place->notablePlace = true;
      }
    }

      return view('categories.search-results', [
        "placesResult" => $placesResult,
        "searchPlace" => $searchPlace,
        "categories" => Category::all(),
        "request" => $request, // Pasar la instancia de Request a la vista
      ]);
  }

  /**
   * Retorna los lugares cercanos a una ubicación,
   * en un radio de X kilómetros
   * @param Request $request
   * @return \Illuminate\Http\JsonResponse
   */
  public function nearbyPlaces(Request $request)
  {
    $latitude = $request->query('latitude');
    $longitude = $request->query('longitude');

    $places = Place::selectRaw("*, ( 6371 * acos( cos( radians(?) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians(?) ) + sin( radians(?) ) * sin( radians( latitude ) ) ) ) AS distance", [$latitude, $longitude, $latitude])
        ->having('distance', '<', 20) // 20 kilometers
        ->orderBy('distance')
        ->get();

    return response()->json($places);
  }

  /**
   * Agrega un lugar a la lista de favoritos del usuario
   * @param Request $request
   * @param int $placeId
   * @return \Illuminate\Http\RedirectResponse
   */
  public function addFavoritePlace(Request $request, $placeId)
  {
    $user = Auth::user();
    $place = Place::find($placeId);
    $favorites = $user->favoritePlaces;
    //$favoriteCount = $favorites->count();
    $placeExist = false;

    foreach ($favorites as $aPlace) {

      if($aPlace->place_id  == $placeId){
        $placeExist = true;

      }
    }

    if (!$place) {
      return redirect()->back()->with('status.message', 'Lugar no encontrado')->with('status.type', 'danger');
    }

    if ($placeExist) {
      return redirect()->back()->with('status.message', 'El lugar ya está en tus favoritos')->with('status.type', 'warning');
    }

    $user->favoritePlaces()->attach($place->place_id);

    return redirect()->back()
    ->with('status.message', 'Lugar agregado a favoritos')->with('status.type', 'success');

  }

  /**
   * Muestra los lugares favoritos del usuario
   * @return \Illuminate\View\View
   */
  public function showFavoritePlaces()
  {
    $user = Auth::user();
    $favorites = $user->favoritePlaces;

    foreach ($favorites as $place) {
      $totalScores = Review::where('place_id', $place->place_id)->pluck('score')->toArray();

      if (count($totalScores) > 0) {
        $totalScore = array_sum($totalScores);
        $averageScore = $totalScore / count($totalScores);
        $averageScore = max(1, min(5, $averageScore));
        $place->totalAverageScore = $averageScore;
      } else {
        $place->totalAverageScore = 3; // Otra opción si no hay reseñas
      }
    }

    $favoritesPlacesActive = true;
    return view('places.favoritePlaces', [
      "placesResult" => $favorites,
      "favoritesPlacesActive" => $favoritesPlacesActive,
    ]);
  }

  /**
   * Elimina un lugar de la lista de favoritos del usuario
   * @param Request $request
   * @param int $placeId
   * @return \Illuminate\Http\RedirectResponse
   */
  public function removeFavoritePlace(Request $request, $placeId)
  {
    $user = Auth::user();
    $place = Place::find($placeId);

    if (!$place) {
        return redirect()->back()->with('status.message', 'Lugar no encontrado')->with('status.type', 'danger');
    }

    // if (!$user->favoritePlaces()->where('place_id', $place->place_id)->exists()) {
    //     return redirect()->back()->with('status.message', 'El lugar no está en tus favoritos')->with('status.type', 'warning');
    // }

    $user->favoritePlaces()->detach($place->place_id);
    return redirect()->back()->with('status.message', 'Lugar eliminado de favoritos')->with('status.type', 'success');
  }

  /**
   * Retorna la vista del mapa
   * @return \Illuminate\View\View
   */
  public function mapViewForm()
  {
    $categories = Category::all()->sortBy('name');
    $mapViewActive = true;
    return view('places.map-places-view', [
      'categories'=> $categories,
      'mapViewActive' => $mapViewActive,
    ]);
  }

  /**
   * Retorna los lugares de una categoría en particular
   * @param int $category_id
   * @return \Illuminate\Http\JsonResponse
   */
  public function getPlacesByCategory($category_id)
  {
    if ($category_id === 'all'){
      $places = Place::all();
    }elseif ($category_id === 'pending') {
      $places = Place::where('status', 0)->get();
    }
    else{
      $places = Place::where('category_id', $category_id)->get();
    }
    return response()->json($places);
  }

  /**
   * Elimina un lugar por su ID
   * @param int $id
   * @return \Illuminate\Http\JsonResponse
   */
  public function deletePlaceById($id)
  {
    $place = Place::where('place_id', $id)->first();

    $place->status = 2;
    $place->save();
    // $place->delete();

    return response()->json([
      'message' => 'Lugar eliminado correctamente',
      'status' => 200
    ]);
  }

  /**
   * Autorizar un lugar subido por un usuario
   * @param int $id
   * @return \Illuminate\Http\RedirectResponse
   */
  public function authorizePlace($id)
  {
      $place = Place::findOrFail($id);
      $place->status = 1;
      $place->save();
      return redirect()->back()->with('status.message', 'Lugar autorizado')->with('status.type', 'success');
  }

  public function editPlaceForm($id)
  {
    $place = Place::where('place_id', $id)->first();
    $addPlaceActive = true;
    return view('places.edit-place-form', [
      "place" => $place,
      "categories" => Category::all(),
      "addPlaceActive" => $addPlaceActive,
    ]);
  }

  public function editPlaceAction(Request $request)
  {
    $place = Place::find($request->input('placeId'));

     // Si el lugar no existe, redirigir con un mensaje de error
    if (!$place) {
      return redirect()->route('AdminPlacesView')->with('status', [
        'type' => 'danger',
        'message' => 'El lugar no existe.'
      ]);
    }

    // Validar los datos entrantes
    $validator = Validator::make($request->all(), [
      'category' => 'required|exists:categories,category_id',
      'place_description' => 'required|string',
      // 'access_entrance' => 'nullable|boolean',
      // 'asisted_entrance' => 'nullable|boolean',
      // 'internal_circulation' => 'nullable|boolean',
      // 'bathroom' => 'nullable|boolean',
      // 'adult_changing_table' => 'nullable|boolean',
      // 'parking' => 'nullable|boolean',
      // 'elevator' => 'nullable|boolean'
    ]);
    // Si la validación falla, redirigir con errores
    if ($validator->fails()) {
      return redirect()->back()->withErrors($validator)->withInput();
    }

    // Actualizar los datos del lugar
    $place->category_id = $request->input('category');
    $place->description = $request->input('place_description');
    $place->access_entrance = $request->has('acces_entrance');
    $place->assisted_access_entrance = $request->has('asisted_entrance');
    $place->internal_circulation = $request->has('internal_circulation');
    $place->bathroom = $request->has('bathroom');
    $place->adult_changing_table = $request->has('adult_changing_table');
    $place->parking = $request->has('parking');
    $place->elevator = $request->has('elevator');

    // Guardar los cambios en la base de datos
    $place->save();

     // Redirigir con un mensaje de éxito
    return redirect()->route('AdminPlacesView')->with('status', [
      'type' => 'success',
      'message' => 'El lugar ha sido actualizado exitosamente.'
    ]);
  }
}
