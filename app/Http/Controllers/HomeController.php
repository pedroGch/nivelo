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
    $noticias = Blog::orderBy('created_at', 'desc')->get();

    return view('blog.index', ['noticias' => $noticias]);
  }

  public function leerArticulo(int $id)
  {
    //dd(Blog::all());
    return view('blog.articuloCompleto', [
      'noticia' => Blog::findOrFail($id),
      'noticias' => Blog::orderBy('created_at', 'desc')->take(3)->get(),
    ]);
  }

}
