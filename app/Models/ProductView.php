<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ProductView
 *
 * @property int $id
 * @property string|null $product_id
 * @property string|null $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Product|null $product
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|ProductView newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductView newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductView query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductView whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductView whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductView whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductView whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductView whereUserId($value)
 * @mixin \Eloquent
 */
class ProductView extends Model
{
    protected $fillable = [
        "product_id",
        "user_id",
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, "product_id");
    }

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }


}
