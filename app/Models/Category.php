<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Category
 *
 * @property int $category_id
 * @property string $name

 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
 * @property string $imagen_cat
 * @property string $alt_img_cat
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereAltImgCat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereImagenCat($value)
 * @mixin \Eloquent
 */
class Category extends Model
{
   // use HasFactory;

  protected $table = "categories";
  protected $fillable = [
    'name',
    'image_cat',
    'alt_img_cat',
  ];
  protected $primaryKey = "category_id";
}
