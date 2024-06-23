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
    $places = Place::where('category_id', $category_id)->get();

    // Obtener los puntajes promedio para cada lugar y agregarlos al array $places
    foreach ($places as $place) {
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

  public function getAllCategories()
  {
    $categories = Category::all();
    return response()->json($categories);
  }

  public function addCategorieAction(Request $request)
  {

    try{
      $data = $request->only(['name', 'alt_img_cat', 'icon', 'image_cat']);
      if($request->hasFile('image')){
        $data['image'] = $request->file('image')->store('/storage/categories');
      }
      if($request->hasFile('icon')){
        $data['icon'] = $request->file('icon')->store('/storage/categories');
      }

      Category::create([
        'name' => $data['name'],
        'image_cat' => $data['image_cat'],
        'alt_img_cat' => $data['alt_img_cat'],
        'icon' => $data['icon'],
      ]);
      return redirect()->route('AdminPlacesView')
        ->with('status.message', 'Categoría agregada correctamente');
    } catch (\Exception $e){
      return redirect()->route('AdminPlacesView')
        ->with('status.message', 'Error al agregar la categoría: ' . $e->getMessage());
    }
  }

  public function editCategorieForm($id)
  {
    $categorie = Category::where('category_id', $id)->get();
    return response()->json($categorie);
  }

  public function editCategorieAction(Request $request, $id)
  {
    try{
      // Validar los datos del formulario
      $request->validate([
        'name' => 'required|string|max:255',
        'alt_img_cat' => 'nullable|string|max:255',
        'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'image_cat' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ]);

      $category = Category::findOrFail($id);

      $data = $request->only(['name', 'alt_img_cat', 'icon', 'image_cat']);

      if($request->hasFile('image')){
        $data['image'] = $request->file('image')->store('/storage/categories');
        $category->image = $data['image'];
      }
      if($request->hasFile('icon')){
        $data['icon'] = $request->file('icon')->store('/storage/categories');
        $category->icon = $data['icon'];
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
