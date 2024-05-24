<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\Review
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $review
 * @property string|null $pic_1
 * @property string|null $pic_2
 * @property string|null $pic_3
 * @property int $score
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Review newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Review newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Review query()
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review wherePic1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review wherePic2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review wherePic3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereReview($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereUserId($value)
 * @mixin \Eloquent
 */
class Review extends Model
{
  // use HasFactory;

  protected $table = "reviews";

  protected $primaryKey = "review_id";

  protected $fillable = [
    "place_id",
    "user_id",
    "review",
    "score",
    "status",
  ];

  public static $rules = [
    "review" => "max:500",
    "score" => "required",
  ];

  public static $errorMessages = [
    "review.max" => "Tu reseña no puede superar los 500 caracteres.",
    "score.required" => "Es obligatorio que selecciones una de las opciones disponibles.",
  ];


  /**
   * Método que devuelve la fecha de creación de la review formateada a DD-MM-AAAA
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


   /**
   * Esta función devuelve las primeras x palabras de un párrafo
   * @param int $q Esta es la q de palabras a extraer (opcional), por defecto 20
   */
  public function shortened_paragraph(int $q = 20): string
  {
    $text = $this->review;

    $array = explode(" ", $text);
    if (count($array) <= $q) {
      $result = $text;
    } else {
      array_splice($array, $q);
      $result = implode(" ", $array) . "...";
    }

    return $result;
  }


  /* RELACIONES */

  /**
   * Relación uno a uno con User
   * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */
  public function user(): HasOne {
    return $this->hasOne(User::class, "id", "user_id");
  }


  /**
   * Relación uno a uno con Place
   * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */
  public function place(): HasOne {
    return $this->hasOne(Place::class, "place_id", "place_id");
  }
}
