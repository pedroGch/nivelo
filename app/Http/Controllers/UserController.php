<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Retorna la vista de perfil de usuario
     * @return \Illuminate\View\View
     */
    public function userProfile() {
      $user = auth()->user();

        return view('personal_conf.user-profile', [
          "user" => $user,
          "category" => Categ
        ]);
    }
}
