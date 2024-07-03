<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'message', 'read', 'category_id', 'place_id'];

    /**
     * Obtiene el usuario al que pertenece la notificación
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
