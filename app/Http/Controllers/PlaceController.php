<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
  /**
  * Retorna la vista de detalle de un lugar
  * @param int $id
  * @return \Illuminate\View\View
  */
  public function placeDetail(int $category_id, int $place_id) {


    return view('places.place-detail', [
      "place" => Place::findOrFail($place_id),
      "category" => Category::findOrFail($category_id),
      "src_information" => Place::findOrFail($place_id)->srcInformation,
      "uploaded_from_id" => Place::findOrFail($place_id)->uploadedFrom,
    ]);
  }


  /**
   * Retorna la vista del formulario de carga de un nuevo lugar
   * @return \Illuminate\View\View
   */
  public function addPlaceForm() {
  return view('places.add-place-form'/*, ["category" => Category::findOrFail($id)] */);
  }



}
