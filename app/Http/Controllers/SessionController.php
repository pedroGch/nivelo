<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
  /**
   * Retorna la vista de la página de inicio de sesión
   * @return \Illuminate\View\View
   */
  public function loginForm()
  {
    return view('/session/login');
  }



  /**
   * Valida los datos del formulario de inicio de sesión y loguea al usuario
   * @param Request $request
   * @return \Illuminate\View\View
   */
  public function loginAction(Request $request)
  {
    $credentials = $request->only(['email', 'password']);
    if (!Auth::attempt($credentials)) {
      return redirect('/iniciar-sesion')->with('status.message', 'Email y/o contraseña incorrecta')
        ->withInput();
    }

    // $url = (Auth::user()->rol == 1) ? '/panel_admin' : '/panel_admin';

    return redirect('/categorias')->with('status.message', 'Hola ' . Auth::user()->name . ', iniciaste sesión con éxito');
  }



  /**
   * Cierra la sesión del usuario
   * @param Request $request
   * @return \Illuminate\View\View
   */
  public function logoutAction(Request $request)
  {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/iniciar-sesion')->with('status.message', 'Sesión cerrada correctamente');
  }


  /**
   * Retorna la vista de la página de creación de cuenta
   * @return \Illuminate\View\View
   */
  public function signupForm()
  {
    return view('/session/signup');
  }

  /**
   * Retorna la vista de la página de creación de cuenta
   * @return \Illuminate\View\View
   */
  public function aboutYouForm()
  {
    return view('/personal_conf/user-conf');
  }

  // /**
  //  * Retorna la vista de la página del dashboard del administrador
  //  * @return \Illuminate\View\View
  //  */
  // public function dashboard_admin()
  // {
  //   return view('dashboard_admin');
  // }

  // /**
  //  * Retorna la vista de la página del perfil del usuario
  //  * @return \Illuminate\View\View
  //  */
  // public function perfil_usuario()
  // {
  //   return view('perfil_usuario');
  // }


  // /**
  //  * Muestra el panel de administración enviando el usuario logueado
  //  * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
  //  */
  // public function dashboardAdmin()
  // {
  //   return view('dashboard_admin', [
  //     '$user' => Auth::user(),
  //   ]);
  // }





}
