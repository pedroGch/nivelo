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

  /**
   * Retorna la vista de la página de blog
   * @return \Illuminate\View\View
   */
  public function blogIndex()
  {
    $noticias = Blog::orderBy('created_at', 'desc')->get();

    return view('blog.index', ['noticias' => $noticias]);
  }

  /**
   * Retorna la vista de un artículo completo
   * @param int $id
   * @return \Illuminate\View\View
   */
  public function leerArticulo(int $id)
  {
    //dd(Blog::all());
    return view('blog.articuloCompleto', [
      'noticia' => Blog::findOrFail($id),
      'noticias' => Blog::orderBy('created_at', 'desc')->take(3)->get(),
    ]);
  }

  /**
   * Retorna la vista del formulario para agregar una nueva noticia
   * @return \Illuminate\View\View
   */
  public function addPostForm()
  {
    return view('blog.add-post-form');
  }

  /**
   * Agrega una nueva noticia a la base de datos
   * @param Request $request
   * @return \Illuminate\Http\RedirectResponse
   */
  public function addPostAction(Request $request)
  {
    $request->validate(Blog::$rules, Blog::$errorMessages);
    try{
      $data = $request->only(['title', 'content', 'image', 'alt', 'video', 'source']);
      if($request->hasFile('image')){
        $data['image'] = $request->file('image')->store('blog');
      }
      Blog::create($data);
      return redirect()->route('blogIndex')
        ->with('status.message', 'Noticia agregada correctamente');
    } catch (\Exception $e){
      return redirect()->route('blogIndex')
        ->with('status.message', 'Error al agregar la noticia: ' . $e->getMessage());
    }
  }

  /**
   * Retorna la vista del formulario para editar una noticia
   * @param int $id
   * @return \Illuminate\View\View
   */
  public function editPostForm(int $id)
  {
    return view('blog.edit-post-form', [
      'noticia' => Blog::findOrFail($id),
    ]);
  }

  /**
   * Edita una noticia en la base de datos
   * @param Request $request
   * @param int $id
   * @return \Illuminate\Http\RedirectResponse
   */
  public function editPostAction(Request $request, int $id)
  {
    $request->validate(Blog::$rules, Blog::$errorMessages);
    try{
      $data = $request->only(['title', 'content', 'image', 'alt', 'video', 'source']);
      if($request->hasFile('image')){
        $data['image'] = $request->file('image')->store('blog');
      }
      Blog::findOrFail($id)->update($data);
      return redirect()->route('blogIndex')
        ->with('status.message', 'Noticia editada correctamente');
    } catch (\Exception $e){
      return redirect()->route('blogIndex')
        ->with('status.message', 'Error al editar la noticia: ' . $e->getMessage());
    }
  }

  /**
   * Elimina una noticia de la base de datos
   * @param int $id
   * @return \Illuminate\Http\RedirectResponse
   */
  public function deletePostAction(int $id)
  {
    try{
      Blog::findOrFail($id)->delete();
      //si tenia una magen cargada la borramos de la carpeta storage
      if($noticia->image && Storage::has($noticia->image)){
        Storage::delete($noticia->image);
      }
      return redirect()->route('blogIndex')
        ->with('status.message', 'Noticia eliminada correctamente');
    } catch (\Exception $e){
      return redirect()->route('blogIndex')
        ->with('status.message', 'Error al eliminar la noticia: ' . $e->getMessage());
    }
  }
}
