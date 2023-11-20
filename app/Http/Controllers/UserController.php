<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\Review;
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

      $myPlaces = Place::where('uploaded_from_id', $userAuth->id)->get();

      $madeReviews = Review::where('user_id', $userAuth->id)->orderBy('created_at', 'desc')->get();

      $UserProfileActive = true;

        return view('personal_conf.user-profile', [
          "userAuth" => $userAuth,
          "userDB" => $userDB,
          "myPlaces" => $myPlaces,
          // "reviewedPlaces" => $reviewedPlaces,
          "madeReviews" => $madeReviews,
          "UserProfileActive" => $UserProfileActive,
        ]);
    }
}
