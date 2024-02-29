<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Cart
 *
 * @property int $id
 * @property string|null $user_id
 * @property string|null $governorate_id
 * @property string|null $subtotal
 * @property string|null $total
 * @property string|null $delivery_cost
 * @property string|null $coupon_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Governorate|null $governorate
 * @property-read \App\Models\Product $products
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Cart newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart query()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereCouponId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereDeliveryCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereGovernorateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereSubtotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereUserId($value)
 * @mixin \Eloquent
 */
class Cart extends Model
{
    protected $fillable = [
        "user_id",
        "governorate_id",
        "subtotal",
        "total",
        "delivery_cost",
        "coupon_id",
    ];

    public function products()
    {
        return $this->belongsTo(Product::class, "product_id");
    }

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function governorate()
    {
        return $this->belongsTo(Governorate::class, "governorate_id");
    }


}
