<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Place
 *
 * @property int $id
 * @property string $name
 * @property string $coordinates
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
 * @mixin \Eloquent
 */
class Place extends Model
{
    use HasFactory;
}
