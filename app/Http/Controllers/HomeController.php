<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Place;
use App\Models\User;
use App\Models\Review;
use App\Models\Category;
use App\Models\Subscriber;
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
   * Retorna la vista de la página Acerca de
   * @return \Illuminate\View\View
   */
  public function about()
  {
    $aboutViewActive = true;
    return view('about',
    ['aboutViewActive' => $aboutViewActive]);
  }

  /**
   * Retorna la vista de la página de términos y condiciones
   * @return \Illuminate\View\View
   */
  public function terms()
  {
    $termsViewActive = true;
    return view('terms-conditions',
    ['termsViewActive' => $termsViewActive]);
  }

  /**
   * Retorna la vista de la página de blog
   * @return \Illuminate\View\View
   */
  public function blogIndex()
  {
    $noticias = Blog::orderBy('created_at', 'desc')->get();

    $blogViewActive = true;

    return view('blog.index', [
      'noticias' => $noticias,
      'blogViewActive' => $blogViewActive,]);
  }

  /**
   * Retorna la vista de un artículo completo
   * @param int $id
   * @return \Illuminate\View\View
   */
  public function leerArticulo(int $id)
  {
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
      return redirect()->route('blogAdmin')
        ->with('status.message', 'Noticia agregada correctamente');
    } catch (\Exception $e){
      return redirect()->route('blogAdmin')
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
      return redirect()->route('blogAdmin')
        ->with('status.message', 'Noticia editada correctamente');
    } catch (\Exception $e){
      return redirect()->route('blogAdmin')
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
      return redirect()->route('blogAdmin')
        ->with('status.message', 'Noticia eliminada correctamente');
    } catch (\Exception $e){
      return redirect()->route('blogAdmin')
        ->with('status.message', 'Error al eliminar la noticia: ' . $e->getMessage());
    }
  }

  /**
   * Retorna la vista del panel de administración
   * @return \Illuminate\View\View
   */
  public function dashboardAdmin()
  {
    // Obtener los datos de las categorías
    $categoriasLugares = [
      'Alojamiento' => Place::where('category_id', 1)->count(),
      'Recreación' => Place::where('category_id', 2)->count(),
      'Comercio' => Place::where('category_id', 3)->count(),
      'Plazas' => Place::where('category_id', 4)->count(),
      'Playas' => Place::where('category_id', 5)->count(),
      'Gastronomía' => Place::where('category_id', 6)->count(),
      'Oficinas del Estado' => Place::where('category_id', 7)->count(),
      'Educación' => Place::where('category_id', 8)->count(),
      'Deporte' => Place::where('category_id', 9)->count(),
      'Salud' => Place::where('category_id', 10)->count(),
      'Transporte' => Place::where('category_id', 11)->count(),
      'Albergues Transitorios' => Place::where('category_id', 12)->count(),
    ];

    $dashboardViewActive = true;

    return view('admin.dashboard', [
      'noticias' => Blog::all(),
      'lugares' => Place::all(),
      'lugaresPendientes' => Place::where('status', 'pending')->get(),
      'usuarios' => User::where('rol', 'user')->get(),
      'suscriptores' => Subscriber::all(),
      'reviews' => Review::all(),
      'reviewsPendientes' => Review::where('status', 'pending')->get(),
      'categoriasLugares' => $categoriasLugares,
      'dashboardViewActive' => $dashboardViewActive,
    ]);
  }

  /**
   * Retorna la vista del administrador del blog
   * @return \Illuminate\View\View
   */
  public function blogAdmin()
  {
    return view('admin.admin-blog', [
      'noticias' => Blog::all(),
    ]);
  }

  /**
   * Retorna la vista del administrador de reseñas
   * @return \Illuminate\View\View
   */
  public function reviewsAdmin()
  {
    return view('admin.admin-reviews', [
      'reviews' => Review::all(),
      'reviewsPendientes' => Review::where('status', 'pending')->get(),
    ]);
  }

  /**
   * Método para aprobar una reseña
   * @param int $review_id
   * @return \Illuminate\Http\RedirectResponse
   * @throws \Exception
   */
  public function approveReviewAction(int $review_id)
  {
    try{
      Review::findOrFail($review_id)->update(['status' => 'approved']);
      return redirect()->route('reviewsAdmin')
        ->with('status.message', 'Reseña aprobada correctamente');
    } catch (\Exception $e){
      return redirect()->route('reviewsAdmin')
        ->with('status.message', 'Error al aprobar la reseña: ' . $e->getMessage());
    }
  }

  /**
   * Método para ocultar una reseña
   * @param int $review_id
   * @return \Illuminate\Http\RedirectResponse
   * @throws \Exception
   */
  public function hideReviewAction(int $review_id)
  {
    try{
      Review::findOrFail($review_id)->update(['status' => 'hidden']);
      return redirect()->route('reviewsAdmin')
        ->with('status.message', 'Reseña ocultada correctamente');
    } catch (\Exception $e){
      return redirect()->route('reviewsAdmin')
        ->with('status.message', 'Error al ocultar la reseña: ' . $e->getMessage());
    }
  }

  /**
   * Retorna la vista del administrador de lugares
   * @return \Illuminate\View\View
   */
  public function AdminPlacesView()
  {
    $categories = Category::all();
    $categoriasLugares = [
      'Alojamiento' => Place::where('category_id', 1)->count(),
      'Recreación' => Place::where('category_id', 2)->count(),
      'Comercio' => Place::where('category_id', 3)->count(),
      'Plazas' => Place::where('category_id', 4)->count(),
      'Playas' => Place::where('category_id', 5)->count(),
      'Gastronomía' => Place::where('category_id', 6)->count(),
      'Oficinas del Estado' => Place::where('category_id', 7)->count(),
      'Educación' => Place::where('category_id', 8)->count(),
      'Deporte' => Place::where('category_id', 9)->count(),
      'Salud' => Place::where('category_id', 10)->count(),
      'Transporte' => Place::where('category_id', 11)->count(),
      'Albergues Transitorios' => Place::where('category_id', 12)->count(),
    ];
    return view('admin.admin-places',['categorias' => $categories,'categoriasLugares' => $categoriasLugares,]);
  }

  /**
   * Retorna la vista del administrador de usuarios
   * @return \Illuminate\View\View
   */
  public function AdminUsersView()
  {
    $users = User::all();

    return view('admin.admin-users',['users' => $users]);
  }
}
