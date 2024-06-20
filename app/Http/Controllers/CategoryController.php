<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Place;
use App\Models\Review;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
  /**
   * Retorna la vista de la página de inicio (con todas las categorías)
   * @return \Illuminate\View\View
   */
  public function index()
  {
    $categories = Category::all()->sortBy('name');
    return view('/categories/index', [
      'categories'=> $categories
    ]);
  }


  /**
   * Retorna la vista de una categoría en particular
   * @param int $id
   * @return \Illuminate\View\View
   */
  public function categoryDetail(int $category_id)
  {
    // $places = Place::where('category_id', $category_id)->get();
    // paginador
    $places = Place::where('category_id', $category_id)->paginate(8);

    // Obtener los puntajes promedio para cada lugar y agregarlos al array $places
    foreach ($places as $place) {
      $totalScores = Review::where('place_id', $place->place_id)->pluck('score')->toArray();

      $fiveStarReviews = Review::where('place_id', $place->place_id)->where('score', 5)->count();

      $place->notablePlace = false;
      if($fiveStarReviews == 10) {
        $place->notablePlace = true;
      }

      if (count($totalScores) > 0) {
        $totalScore = array_sum($totalScores);
        $averageScore = $totalScore / count($totalScores);
        $averageScore = max(1, min(5, $averageScore));
        $place->totalAverageScore = $averageScore;
      } else {
        $place->totalAverageScore = 3; // Otra opción si no hay reseñas
      }
    }

    return view('/categories/one-category', [
      "category" => Category::findOrFail($category_id),
      "places" => $places,
    ]);
}


  /**
   * Calcula el promedio de los score de las reviews de un lugar
   * @param int $place_id
   * @return int
   */
  public function totalScoreByPlace(int $place_id)
  {
    $scores = Review::where('place_id', $place_id)->pluck('score')->toArray();

    if (count($scores) > 0) {
      $totalPlaceScore = array_sum($scores);
      $averagePlaceScore = $totalPlaceScore / count($scores);
      $averagePlaceScore = max(1, min(5, $averagePlaceScore));
      return $averagePlaceScore;
    } else {
      return 0; // Otra opción si no hay puntajes
    }
}

}
