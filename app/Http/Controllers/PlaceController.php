<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Place;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use App\Models\UserMoreInfo;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlaceController extends Controller
{
  /**
  * Retorna la vista de detalle de un lugar
  * @param int $id
  * @return \Illuminate\View\View
  */
  public function placeDetail(int $category_id, int $place_id)
  {
    $scores = Review::where('place_id', $place_id)->get('score');

    ($scores->count() > 0) ? $totalPlaceScore = $scores->sum('score') : $totalPlaceScore = 3;
    $averagePlaceScore = $totalPlaceScore / ($scores->count() > 0 ? $scores->count() : 1);

    $averagePlaceScore = max(1, min(5, $averagePlaceScore));

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
    ]);
  }


  /**
   * Retorna la vista del formulario de carga de un nuevo lugar
   * @return \Illuminate\View\View
   */
  public function addPlaceForm()
  {
    return view('places.add-place-form', [
      "categories" => Category::all()
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
      $data = $request->file('main_img')->store('places');
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
    ]);

    $placeId = $newPlace->place_id;
    return redirect()
      ->route('addReviewForm', ['category_id' => $request->category, 'place_id' => $placeId])
      ->with('status.message', '¡El lugar fue cargado correctamente!, ahora podés calificarlo.');
  }

    /**
   * Retorna una vista con los resultados
   * @return \Illuminate\View\View
   */
  public function searchPlaces (Request $request)
  {
    $searchPlace = $request->buscar;

    $placesResult = Place::where('name', 'LIKE', "%$searchPlace%")
      ->orWhere('address', 'LIKE', "%$searchPlace%")
      ->orWhere('city', 'LIKE', "%$searchPlace%")
      ->orWhere('province', 'LIKE', "%$searchPlace%")
      ->get();

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
    }

      return view('categories.search-results', [
        "placesResult" => $placesResult,
        "searchPlace" => $searchPlace,
      ]);
  }

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
    return redirect()->back()->with('status.message', 'Lugar agregado a favoritos')->with('status.type', 'success');
  }

  public function showFavoritePlaces()
  {
    $user = Auth::user();
    $favorites = $user->favoritePlaces;

    return view('places.favoritePlaces', [
      "placesResult" => $favorites,
    ]);
  }

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

  public function mapViewForm()
  {
    $categories = Category::all()->sortBy('name');
    return view('places.map-places-view', [
      'categories'=> $categories
    ]);
  }

  public function getPlacesByCategory($category_id)
  {
    // Obtiene la categoría por su ID
    $places = Place::where('category_id', $category_id)->get();

    return response()->json($places);
  }
}
