<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SrcInformation
 *
 * @property int $id
 * @property string $name
 * @property string|null $logo
 * @property string|null $website
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SrcInformation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SrcInformation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SrcInformation query()
 * @method static \Illuminate\Database\Eloquent\Builder|SrcInformation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SrcInformation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SrcInformation whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SrcInformation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SrcInformation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SrcInformation whereWebsite($value)
 * @mixin \Eloquent
 */
class SrcInformation extends Model
{
    use HasFactory;
}
