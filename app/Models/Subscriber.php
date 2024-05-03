<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Subscriber
 * @property int $subscriber_id
 * @property string $name-subscriber
 * @property string $email-subscriber
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Subscriber newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscriber newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscriber query()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscriber whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscriber whereEmailSubscriber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscriber whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscriber whereNameSubscriber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscriber whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Subscriber extends Model
{
    // use HasFactory;

    protected $table = "subscribers";

    protected $primaryKey = "subscriber_id";

    protected $fillable = [
        "name-subscriber",
        "email-subscriber"
    ];

    public static $rules = [
        "name-subscriber" => "required",
        "email-subscriber" => "required|email|unique:subscribers,email-subscriber"
    ];

    public static $errorMessages = [
        "name-subscriber.required" => "El nombre es obligatorio.",
        "email-subscriber.required" => "El email es obligatorio.",
        "email-subscriber.email" => "El email debe ser válido.",
        "email-subscriber.unique" => "Ya estás suscrito."
    ];
}
