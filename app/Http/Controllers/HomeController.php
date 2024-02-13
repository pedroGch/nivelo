<?php

namespace App\Http\Controllers;

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

  $noticias = [
    [
        'id' => 1,
        'titulo' => 'Título de la primera noticia',
        'descripcion' => 'Descripción de la primera noticia...',
        'imagen' => 'imagen1.jpg',
        'alt' => 'Texto alternativo para la imagen 1',
    ],
    [
        'id' => 2,
        'titulo' => 'Título de la segunda noticia',
        'descripcion' => 'Descripción de la segunda noticia...',
        'imagen' => 'imagen2.jpg',
        'alt' => 'Texto alternativo para la imagen 2',
    ],
    // Agrega más noticias si es necesario
  ];

  return view('blog.index', ['noticias' => $noticias]);
}

}
