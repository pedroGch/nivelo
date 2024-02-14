<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  /**
   * Retorna la vista de la página de inicio
   * @return \Illuminate\View\View
   */
  public function index()
  {
    return view('home');
  }

  public function blogIndex()
  {
    $noticias = Blog::all();

    return view('blog.index', ['noticias' => $noticias]);
  }

}
