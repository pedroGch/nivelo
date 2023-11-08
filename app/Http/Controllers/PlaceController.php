<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlaceController extends Controller
{
  /**
  * Retorna la vista de detalle de un lugar
  * @param int $id
  * @return \Illuminate\View\View
  */
  public function placeDetail(/*int $id*/) {
    return view('places.place-detail'/*, ["place" => Place::findOrFail($id)] */);
  }
}
