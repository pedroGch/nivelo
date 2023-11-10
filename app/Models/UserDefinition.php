<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\UserDefinition
 *
 * @method static \Illuminate\Database\Eloquent\Builder|UserDefinition newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserDefinition newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserDefinition query()
 * @mixin \Eloquent
 */
class UserDefinition extends Model
{
     // use HasFactory;

   protected $table = 'user_definition';

   protected $primaryKey = 'id';





    /* RELACIONES */

    /**
     *  Define la relación (uno a uno) entre la tabla users y la tabla user_definition
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
     public function user(): BelongsTo
     {
         return $this->belongsTo(User::class, 'id', 'id');
     }
}
