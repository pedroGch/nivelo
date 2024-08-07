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

    $categoriesViewActive = true;
    return view('/categories/index', [
      'categories'=> $categories,
      'categoriesViewActive' => $categoriesViewActive,
    ]);
  }


  /**
   * Retorna la vista de una categoría en particular
   * @param int $id
   * @return \Illuminate\View\View
   */
  public function categoryDetail(int $category_id)
  {
    $places = Place::where('category_id', $category_id)
      ->where('status', true)
      ->paginate(8);

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

  /**
   * Retorna todas las categorías en formato JSON
   * @return \Illuminate\Http\JsonResponse
   */
  public function getAllCategories()
  {
    $categories = Category::all();
    return response()->json($categories);
  }

  /**
   * Agrega una nueva categoría a la base de datos
   */
  public function addCategorieAction(Request $request)
  {

    try{
      $data = $request->only(['name', 'alt_img_cat', 'image_cat']);
      if($request->hasFile('image_cat')){
        $data['image_cat'] = $request->file('image_cat')->store('/storage/categories', 'public');
      }
//dd($data);
      Category::create([
        'name' => $data['name'],
        'image_cat' => $data['image_cat'],
        'alt_img_cat' => $data['alt_img_cat'],
      ]);
      return redirect()->route('AdminPlacesView')
        ->with('status.message', 'Categoría agregada correctamente');
    } catch (\Exception $e){
      return redirect()->route('AdminPlacesView')
        ->with('status.message', 'Error al agregar la categoría: ' . $e->getMessage());
    }
  }

  /**
   * Muestra el formulario para editar una categoría
   * @param Request $request
   * @param int $id
   * @return \Illuminate\Http\RedirectResponse
   */
  public function editCategorieForm($id)
  {
    $categorie = Category::where('category_id', $id)->get();
    return response()->json($categorie);
  }

  /**
   * Actualiza una categoría en la base de datos
   * @param Request $request
   * @param int $id
   * @return \Illuminate\Http\RedirectResponse
   */
  public function editCategorieAction(Request $request, $id)
  {
    try{
      // Validar los datos del formulario
      $request->validate([
        'name' => 'required|string|max:255',
        'alt_img_cat' => 'nullable|string|max:255',
        'image_cat' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ]);

      $category = Category::findOrFail($id);

      $data = $request->only(['name', 'alt_img_cat', 'image_cat']);

      if($request->hasFile('image_cat')){
        $data['image_cat'] = $request->file('image_cat')->store('/storage/categories', 'public');
        $category->image_cat = $data['image_cat'];
      }

      // Actualizar los campos de la categoría
      $category->name = $data['name'];
      $category->alt_img_cat = $data['alt_img_cat'];

      // Guardar los cambios en la base de datos
      $category->save();

      // Redirigir con un mensaje de éxito
      return redirect()->route('AdminPlacesView')->with('status.message', 'Categoría actualizada con éxito')->with('status.type', 'success');
    } catch (\Exception $e){
      return redirect()->route('AdminPlacesView')
        ->with('status.message', 'Error al modificar la categoría: ' . $e->getMessage());
    }
  }



}
