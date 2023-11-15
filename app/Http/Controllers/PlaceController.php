<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Place;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use App\Models\UserMoreInfo;
use DateTime;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
  /**
  * Retorna la vista de detalle de un lugar
  * @param int $id
  * @return \Illuminate\View\View
  */
  public function placeDetail(int $category_id, int $place_id) {

    $scores = Review::where('place_id', $place_id)->get('score');

    ($scores->count() > 0) ? $totalPlaceScore = $scores->sum('score') : $totalPlaceScore = 0;
    $averagePlaceScore = $totalPlaceScore / $scores->count();

    $averagePlaceScore = max(1, min(5, $averagePlaceScore));

    return view('places.place-detail', [
      "place" => Place::findOrFail($place_id),
      "category" => Category::findOrFail($category_id),
      "src_information" => Place::findOrFail($place_id)->srcInformation,
      "uploaded_from_id" => Place::findOrFail($place_id)->uploadedFrom,
      "reviews" => Review::where('place_id', $place_id)->get(),
      "averagePlaceScore" => $averagePlaceScore,

    ]);
  }


  /**
   * Retorna la vista del formulario de carga de un nuevo lugar
   * @return \Illuminate\View\View
   */
  public function addPlaceForm()
  {
    return view('places.add-place-form', ["categories" => Category::all()]);
  }


  /**
   * Retorna la vista del formulario de carga de un nuevo lugar
   * @return \Illuminate\View\View
   */
  public function addPlaceAction(Request $request)
  {
    $userId = Auth::id();

    Place::Create([
      'name' => $request->place_name,
      'address' => $request->addressPlace,
      'city' => $request->cityPlace,
      'province' => $request->provincePlace,
      'coordinates' => $request->coordinatesPlace,
      'description' => $request->place_description,
      'main_img' => '',
      'alt_main_img' => 'imagen subida por el usuario '.$userId,
      'access_entrance' => $request->acces_entrance === 'on' ? true : false,
      'assisted_access_entrance' => $request->asisted_entrance === 'on' ? true : false,
      'internal_circulation' => $request->internal_circulation === 'on' ? true : false,
      'bathroom' => $request->bathroom === 'on' ? true : false,
      'adult_changing_table' => $request->adult_changing_table === 'on' ? true : false,
      'parking' => $request->parking === 'on' ? true : false,
      'elevator' => $request->elevator === 'on' ? true : false,
      'src_info_id' => 2,
      'review_id' => null,
      'category_id' => 1,
      'uploaded_from_id' => 2,
    ]);
    return redirect()
      ->route('categories')
      ->with('status.message', 'El lugar fue cargado correctamente');
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

    dd($placesResult);
    return redirect()
      ->route('searchResults', ['placesResult' => $placesResult])
      ->with('status.message', 'El lugar fue cargado correctamente');
  }
}
