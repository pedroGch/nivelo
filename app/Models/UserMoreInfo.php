<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\UserMoreInfo
 *
 * @property int $id
 * @property string $surname
 * @property string $username
 * @property string $birth_date
 * @property string|null $profile_pic
 * @property string $rol
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|UserMoreInfo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserMoreInfo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserMoreInfo query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserMoreInfo whereBirthDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserMoreInfo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserMoreInfo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserMoreInfo whereProfilePic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserMoreInfo whereRol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserMoreInfo whereSurname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserMoreInfo whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserMoreInfo whereUsername($value)
 * @mixin \Eloquent
 */
class UserMoreInfo extends Model
{
   // use HasFactory;

  protected $table = 'user_more_info';

  protected $primaryKey = 'id';

  protected $fillable = [
    'surname',
    'username',
    'birth_date',
    'profile_pic',
    'user_id',
  ];

  public static $rules = [
    'surname' => "required|max:30",
    'username' => "required|max:30",
    'birth_date' => "required",
  ];

  public static $errorMessages = [
    'username.required' => 'El nombre es requerido',
    'surname.required' => 'El apellido es requerido',
    'username.max' => 'El nombre no puede contener más de 30 carateres',
    'surname.max' => 'El apellido no puede contener más de 30 carateres',
    'birth_date.required' => 'La fecha de nacimiento es requerida',
  ];


    /* RELACIONES */

    /**
     *  Define la relación (uno a uno) entre la tabla users y la tabla user_more_info
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    //  public function user(): BelongsTo
    //  {
    //      return $this->belongsTo(User::class, 'id', 'id');
    //  }
}
