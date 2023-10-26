<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   // use HasFactory;

   /**
   * Retorna la vista de la página de Categorías
   * @return \Illuminate\View\View
   */
  public function categories()
  {
    return view('/');
  }
}
