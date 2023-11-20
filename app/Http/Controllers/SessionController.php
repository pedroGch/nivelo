<?php

namespace App\Http\Controllers;

use App\Models\User;
//use App\Models\UserMoreInfo;
use App\Models\UserDefinition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

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
      return redirect('/iniciar-sesion')
        ->with('status.message', 'Email y/o contraseña incorrecta')
        ->with('status.type', 'danger')
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

  /**
   * Retorna la vista de la página de creación de cuenta
   * @return \Illuminate\View\View
   */
  public function loginWithGoogle()
  {
    return Socialite::driver('google')->redirect();
  }

/**
 * Retorna la vista de la página de creación de cuenta
 * @return \Illuminate\View\View
 */
public function googleCallback()
{
  $user = Socialite::driver('google')->user();
  $userExist = User::where('external_id', $user->id)->where('external_auth', 'google')->first();
  $userEmailExist = User::where('email', $user->email)->first();

  if($userExist){
    Auth::login($userExist);
    return redirect()
      ->route('categories');
  }
  if( $userEmailExist){
    Auth::login($userEmailExist);
    return redirect()
      ->route('categories');
  }
  $newUser = User::Create([
    'name' => $user->name,
    'email' => $user->email,
    'avatar' => $user->avatar,
    'external_id' => $user->id,
    'external_auth' => 'google',
  ]);

  //$userMoreInfo = UserMoreInfo::Create(['user_id'=>$newUser->id]);
  $userDefinition = UserDefinition::Create(['user_id'=>$newUser->id]);

  Auth::login($newUser);

  return redirect()
    ->route('aboutYouAction');
}

public function aboutYouAction(Request $request)
{
  $userId = Auth::id();
  // Obtener los valores de los checkboxes
  $checkboxValues = [
    'sticks' => $request->input('sticks')  === 'on' ? true : false,
    'crutches' => $request->input('crutches')  === 'on' ? true : false,
    'walker' => $request->input('walker')  === 'on' ? true : false,
    'difficult_walking' => $request->input('difficult_walking')  === 'on' ? true : false,
    'manual_wheelchair' => $request->input('manual_wheelchair')  === 'on' ? true : false,
    'electric_wheelchair' => $request->input('electric_wheelchair')  === 'on' ? true : false,
    'scooter' => $request->input('scooter')  === 'on' ? true : false,
    'companion' => $request->input('companion')  === 'on' ? true : false,
  ];
  // Verificar si al menos uno de ellos tiene valor "on"
  $anyOn = in_array(true, $checkboxValues);

  // Hacer algo en base al resultado
  if ($anyOn) {
    $userDefinition = UserDefinition::findOrFail($userId);
    $userDefinition->update($checkboxValues);
    return redirect()
      ->route('categories');
  }
  return redirect()
    ->route('aboutYouForm')
    ->with('status.message', 'Tenes que escoger al menos una opción')
    ->with('status.type', 'warning');
}

public function signupAction(Request $request)
{
  //valido lo que me llego en la request
  $request->validate(User::$rules, User::$errorMessages);
  //selecciono los datos de la request para guardar en la tabla user
  $data = $request->only(['name', 'usurname', 'email', 'birth_date','password']);
  //guardo en la tabla user
  $newUser = User::create($data);
  //autentico al usuario
  Auth::login($newUser);
  //creo la tabla de user definition
  $userDefinition = UserDefinition::Create(['user_id'=>$newUser->id]);
  //re direcciono a la vista de aboutYouForm
  return redirect()
    ->route('aboutYouForm')
    ->with('status.message', 'Tu perfil fue generado exitosamente');
}




}
