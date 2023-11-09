<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
  /**
   * Retorna la vista de la página de inicio (con todas las categorías)
   * @return \Illuminate\View\View
   */
  public function index()
  {
    $categories = Category::all();
    return view('/categories/index', ['categories'=> $categories]);
  }


  /**
   * Retorna la vista de una categoría en particular
   * @param int $id
   * @return \Illuminate\View\View
   */
  public function categoryDetail(/*int $id*/) {
  return view('/categories/one-category'/*, ["category" => Category::findOrFail($id)] */);
  }
}
