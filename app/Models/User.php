<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Validation\Rule;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @property-read \App\Models\UserMoreInfo|null $userMoreInfo
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'external_id',
        'external_auth',
    ];
    public static $rules = [
      'name' => "required|max:30",
      'email' => [
        'required',
        'email', // Asegura que sea un formato de correo electrónico válido
        //Rule::unique('tu_tabla')->ignore($this->id),
      ],
      'password' => "required",
    ];

    public static $errorMessages = [
      'name.required' => 'El nombre es requerido',
      'name.max' => 'El nombre es no puede contener más de 30 carateres',

      'email.required' => 'El email es requerido',
      'email.email' => 'El email debe ser valido',

      'password.required' => 'El password es requerido',

    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    /* RELACIONES */

    /**
     * Relación (uno a uno) entre la tabla users y la tabla user_more_info
     * Devuelve el objeto UserMoreInfo asociado al usuario
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user_more_info(): HasOne
    {
        return $this->hasOne(UserMoreInfo::class, 'id', 'id');
    }


    /**
     * Relación (uno a uno) entre la tabla users y la tabla user_definition
     * Devuelve el objeto UserDefinition asociado al usuario
     */
    public function user_definition(): HasOne
    {
        return $this->hasOne(UserDefinition::class, 'id', 'id');
    }


    /**
     * Relación (uno a muchos) entre la tabla users y la tabla review
     * Devuelve un array con los objetos Review asociados al usuario
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class, 'user_id', 'id');
    }
}
