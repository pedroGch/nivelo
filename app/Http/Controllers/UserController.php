<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Retorna la vista de perfil de usuario
     * @return \Illuminate\View\View
     */
    public function userProfile() {
      $userAuth = auth()->user();

      $userDB = User::where('id', $userAuth->id)->first();

        return view('personal_conf.user-profile', [
          "userAuth" => $userAuth,
          "userDB" => $userDB,
        ]);
    }
}
