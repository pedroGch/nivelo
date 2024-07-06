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
 * @property string $surname
 * @property string $username
 * @property mixed $password
 * @property string $email
 * @property string $bio
 * @property string $status
 * @property string $email_verified_at
 * @property string|null $remember_token
 * @property string $birth_date
 * @property string $profile_pic
 * @property string $rol
 * @property string $created_at
 * @property string $updated_at
 * @property string $avatar
 * @property string $alt
 * @property string $external_id
 * @property string $external_auth
 * @property float|null $latitude
 * @property float|null $longitude
 * * @property \Illuminate\Support\Carbon|null $email_verified_at
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
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLongitude($value)
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
        'surname',
        'username',
        'email',
        'birth_date',
        'password',
        'bio',
        'avatar',
        'alt',
        'external_id',
        'external_auth',
        'terms',
        'status',
        'latitude',
        'longitude'
    ];

    public static $rules = [
        'name' => "required|max:30",
        'surname' => "required|max:30",
        'username' => "required|max:30",
        'bio' => "max:255",
        'email' => "required|email",
        'birth_date' => "nullable|date",
        'password' => "required",
        'terms' => "accepted",
        'avatar' => 'required|string|in:01.jpg,02.jpg,03.jpg,04.jpg,05.jpg,06.jpg',
    ];

    public static $errorMessages = [
        'name.required' => 'El nombre es requerido',
        'name.max' => 'El nombre es no puede contener más de 30 caracteres',
        'email.required' => 'El email es requerido',
        'email.email' => 'El email debe ser válido',
        'password.required' => 'El password es requerido',
        'bio.max' => 'Tu descripción no puede superar los 255 caracteres',
        'username.required' => 'El nombre de usuario es requerido',
        'surname.required' => 'El apellido es requerido',
        'username.max' => 'El nombre no puede contener más de 30 caracteres',
        'surname.max' => 'El apellido no puede contener más de 30 caracteres',
        'birth_date.date' => 'La fecha de nacimiento debe ser válida',
        'terms.accepted' => 'Es necesario que aceptes los términos y condiciones',
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

    public function sentChats()
    {
        return $this->hasMany(Chat::class, 'sender_id');
    }

    public function receivedChats()
    {
        return $this->hasMany(Chat::class, 'receiver_id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class, 'sender_id');
    }

    public function favoritePlaces()
    {
        return $this->belongsToMany(Place::class, 'user_place_favorites', 'user_id', 'place_id');
    }

    /**
     * obtener las notificaciones del usuario
     * Relación (uno a muchos) entre la tabla users y la tabla notification
     * @return HasMany
     */
    public function notifications(): HasMany
    {
        return $this->hasMany(Notification::class);
    }
}
