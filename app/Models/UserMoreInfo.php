<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserMoreInfo extends Model
{
   // use HasFactory;

   protected $table = 'user_more_info';

   protected $primaryKey = 'id';





    /* DB RELATIONSHIPS */

    /**
     *  Define la relación (uno a uno) entre la tabla users y la tabla user_more_info
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
     public function user(): BelongsTo
     {
         return $this->belongsTo(User::class, 'id', 'id');
     }
}
