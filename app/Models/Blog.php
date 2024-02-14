<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $title
 * @property string $image
 * @property string $alt
 * @property string $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Blog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog query()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereAlt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereContenido($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereCreador($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereImagen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereTitulo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereUpdatedAt($value)
 */
class Blog extends Model
{
  //use HasFactory;

  protected $table = 'blog';
  protected $fillable = ['title','image','alt','content'];

  public static $rules = [
    'title' => 'required|max:255',
    'content' => 'required'
  ];

  public static $errorMessages = [
    'title.required' => 'El título es requerido',
    'title.max' => 'El título no puede contener más de 255 carateres',
    'content.required' => 'La publicación debe tener un contenido',
  ];

  /**
   * Esta función devuelve las primeras x palabras de un párrafo
   * @param int $cantidad Esta es la cantidad de palabras a extraer (Opcional)
   */
  public function descripcion_reducida(int $value = 50): string
  {
    $text = $this->content;

    $array = explode(" ", $text);
    if (count($array) <= $value) {
      $result = $text;
    } else {
      array_splice($array, $value);
      $result = implode(" ", $array) . "...";
    }

    return $result;
  }
}
