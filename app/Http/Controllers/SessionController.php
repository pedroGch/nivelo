<?php

namespace App\Http\Controllers;

use App\Models\User;
//use App\Models\UserMoreInfo;
use App\Models\UserDefinition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;

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

    $url = (Auth::user()->rol == 'admin') ? '/dashboard' : '/categorias';

    return redirect($url)->with('status.message', 'Hola ' . Auth::user()->name . ', iniciaste sesión con éxito');
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
   * Método que se ejecuta cuando el usuario se loguea con Google
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

    $userDefinition = UserDefinition::Create(['user_id'=>$newUser->id]);

    Auth::login($newUser);

    return redirect()
      ->route('aboutYouAction');
  }

  /**
   * Método que guarda los datos de la vista aboutYouForm en la base de datos (cómo se moviliza el usuario)
   * @return \Illuminate\View\View
   */
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
      'none' => $request->input('none')  === 'on' ? true : false,
    ];
    // Verificar si al menos uno de ellos tiene valor "on"
    $anyOn = in_array(true, $checkboxValues);

    // Hacer algo en base al resultado
    if ($anyOn) {
      $userDefinition = UserDefinition::findOrFail($userId);
      $userDefinition->update($checkboxValues);
      return redirect()
        ->route('userProfile')
        ->with('status.message', 'Tu perfil se actualizó exitosamente');

    }
    return redirect()
      ->route('aboutYouForm')
      ->with('status.message', 'Tenés que seleccionar al menos una opción')
      ->with('status.type', 'warning')
      ->withInput();
  }


  /**
   * Método que registra un nuevo usuario en la base de datos
   * @return \Illuminate\View\View
   */
  public function signupAction(Request $request)
  {
    //valido lo que me llego en la request
    $request->validate(User::$rules, User::$errorMessages);
    //selecciono los datos de la request para guardar en la tabla user
    $data = $request->only(['name', 'surname' ,'username', 'email', 'birth_date','password']);
    //guardo en la tabla user
    $newUser = User::create($data);
    //autentico al usuario
    Auth::login($newUser);
    //creo la tabla de user definition
    $userDefinition = UserDefinition::Create([
      'user_id'=>$newUser->id
    ]);

    //redirecciono a la vista de aboutYouForm
    return redirect()
      ->route('aboutYouForm')
      ->with('status.message', 'Tu perfil fue generado exitosamente');
  }

  /**
   * Retorna la vista del formulario de edición de perfil del usuario
   * @return \Illuminate\View\View
   */
  public function editProfileForm()
  {
    return view('/profile/edit');
  }

  /**
   * Actualiza la información del usuario
   * @param Request $request
   * @return \Illuminate\View\View
   */
  public function editProfileAction(Request $request)
  {
    if(!isset($request->username) && !isset($request->bio) && !isset($request->password_old)){

      return redirect()
        ->route('userProfile')
        ->with('status.message', 'Tu perfil no sufrio cambios.')
        ->with('status.type', 'warning');
    }

    $user = Auth::user();
    // Validar nombre de usuario si está presente en la solicitud
    if (isset($request->username)) {
      $request->validate([
        'username' => 'required|string|max:255|unique:users,username,' . $user->id,
      ],[
        'username.unique' => 'El nombre de usuario ya está en uso.',
      ]);
      $user->username = $request->username;
    }

    // Validar contraseñas si están presentes en la solicitud
    if (isset($request->password_old) || isset($request->password_new)) {
      $request->validate([
        'password_old' => 'required|string|min:6',
        'password_new' => 'required|string|min:6',
      ], [
        'password_old.required' => 'Debes ingresar tu contraseña actual.',
        'password_new.required' => 'Debes ingresar una nueva contraseña.',
        'password_new.min' => 'La longitud debe ser de al menos 6 caracteres.',
      ]);

      if (Hash::check($request->password_old, $user->password)) {
        $user->password = Hash::make($request->password_new);
      } else {
        return back()->withErrors(['password_old' => 'La contraseña actual es incorrecta.']);
      }
    }

    // Validar la bio si está presente en la solicitud
    if (isset($request->bio)) {
      $request->validate([
        'bio' => 'nullable|string|max:255',
      ], [
        'bio.max' => 'La biografía no puede exceder los 255 caracteres.',
      ]);
      $user->bio = $request->bio;
    }


    // Guardar los cambios
    $user->save();

    return redirect()
      ->route('userProfile')
      ->with('status.message', 'Perfil actualizado correctamente.');
  }
}
