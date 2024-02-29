<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Design
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $image
 * @property string|null $type
 * @property string $product_count
 * @property int $record_state
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Design newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Design newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Design query()
 * @method static \Illuminate\Database\Eloquent\Builder|Design whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Design whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Design whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Design whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Design whereProductCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Design whereRecordState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Design whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Design whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Design extends Model
{
    protected $fillable = [
        "name",
        "image",
        "type",
        "product_count",
        "record_state"
    ];
}
