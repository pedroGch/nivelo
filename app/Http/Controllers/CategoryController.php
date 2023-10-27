<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
  /**
   * Retorna la vista de la página de inicio
   * @return \Illuminate\View\View
   */
  public function index()
  {
    return view('/categories/index');
  }

  // acá vamos a ir agregando los métodos que necesitemos para renderizar las otras vistas
}
