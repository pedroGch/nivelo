<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Place
 *
 * @property int $place_id
 * @property string $name
 * @property string|null $description
 * @property int $access_entrance
 * @property int $assisted_access_entrance
 * @property int $internal_circulation
 * @property int $bathroom
 * @property int $adult_changing_table
 * @property int $parking
 * @property int $elevator
 * @property int $src_info_id
 * @property int|null $review_id
 * @property int $category_id
 * @property int $uploaded_from_id
 * @property string $address
 * @property string $city
 * @property string $province
 * @property string|null $main_img
 * @property string|null $alt_main_img
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Place newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Place newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Place query()
 * @method static \Illuminate\Database\Eloquent\Builder|Place whereAccessEntrance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Place whereAdultChangingTable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Place whereAssistedAccessEntrance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Place whereBathroom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Place whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Place whereCoordinates($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Place whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Place whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Place whereElevator($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Place whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Place whereInternalCirculation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Place whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Place whereParking($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Place whereReviewId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Place whereSrcInfoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Place whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Place whereUploadedFromId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Place whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Place whereAltMainImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Place whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Place whereMainImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Place whereProvince($value)
 * @mixin \Eloquent
 */
class Place extends Model
{
   // use HasFactory;

  protected $table = "places";

  protected $primaryKey = "place_id";

  protected $fillable = [
    'name',
    'address',
    'city',
    'province',
    'description',
    'main_img',
    'alt_main_img',
    'access_entrance',
    'assisted_access_entrance',
    'internal_circulation',
    'bathroom',
    'adult_changing_table',
    'parking',
    'elevator',
    'src_info_id',
    'review_id',
    'category_id',
    'uploaded_from_id',
    'latitude',
    'longitude',
    'status',

  ];

  public static $rules = [
    'place_name' => 'required|string|max:255',
    'place_description' => 'required|string|max:255',
    'main_img' => 'required',
    'category' => 'required|integer',
  ];

  public static $errorMessages = [
    'place_name.required' => 'El nombre del lugar es obligatorio',
    'place_name.string' => 'El nombre del lugar debe ser un texto',
    'place_name.max' => 'El nombre del lugar no puede superar los 255 caracteres',
    'place_description.required' => 'La descripción del lugar es obligatoria',
    'place_description.string' => 'La descripción del lugar debe ser un texto',
    'place_description.max' => 'La descripción del lugar no puede superar los 255 caracteres',
    'main_img.required' => 'La imagen principal del lugar es obligatoria',
    'category.required' => 'La categoría del lugar es obligatoria',
    'category.integer' => 'La categoría del lugar es obligatoria',
  ];


  /**
   * Método que devuelve la fecha de creación del lugar formateada a DD-MM-AAAA
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
   * Esta función corta un string cuando encuentra la primera coma y se queda solo con la primer parte.
   * @return string
   */
  public function getFirstPartOfName() : string
  {
    $name = $this->name;
    $name = explode(',', $name);
    return $name[0];
  }

  /**
   * Esta función corta un string cuando encuentra la primera coma y se queda solo con el texto que sigue a partir de la coma.
   * @return string
   */
  public function getSecondPartOfName() : string
  {
    $name = $this->name;
    $name = explode(',', $name);

    $secondaryPart = array_shift($name);
    return trim(implode(',', $name));
  }

  /* RELACIONES */

  /**
   * Relación de uno a muchos inversa entre Place y Category
   * esta función devuelve el objeto Category que corresponde al place
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function categories() :BelongsTo
  {
    return $this->belongsTo(Category::class, 'category_id', 'category_id');
  }


  /**
   * Relación de uno a muchos inversa entre Place y SrcInformation
   * esta función devuelve el objeto SrcInfo que corresponde al place
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function src_information() :BelongsTo
  {
    return $this->belongsTo(SrcInformation::class, 'src_info_id', 'src_info_id');
  }


  /**
   * Relación de uno a muchos inversa entre Place y User
   * esta función devuelve el objeto User que corresponde al place
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function users() :BelongsTo
  {
    return $this->belongsTo(User::class, 'uploaded_from_id', 'id');
  }



  public function reviews(): HasMany
  {
    return $this->hasMany(Review::class, 'place_id', 'place_id');
  }
  public function favoritedBy()
  {
    return $this->belongsToMany(User::class, 'user_place_favorites', 'place_id', 'user_id');
  }
}
