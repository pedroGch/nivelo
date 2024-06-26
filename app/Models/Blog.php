<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTime;
use Illuminate\Database\Eloquent\Casts\Attribute;

/**
 * @property integer $id
 * @property string $title
 * @property string $image
 * @property string $alt
 * @property string $content
 * @property string $video
 * @property string $source
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
  protected $fillable = ['title','image','alt','content', 'video', 'source'];

  public static $rules = [
    'title' => 'required|max:255',
    'content' => 'required',
    

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
  public function descripcion_reducida(int $value = 25): string
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

  /**
   * Método que devuelve la fecha de creación del blog formateada a DD-MM-AAAA
   * utilizando accessors y mutators
   * @return Attribute
   */
  public function createdAt() : Attribute
  {
    return Attribute::make(
      function($value) {
         $value = new DateTime($value);
         return $value->format('d-m-Y');
      },
      function($value) {
          return $value;
      }
    );
  }
}
