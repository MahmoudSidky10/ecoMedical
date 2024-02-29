<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CouponUser
 *
 * @property int $id
 * @property string|null $user_id
 * @property string|null $coupon_id
 * @property string|null $order_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Coupon|null $coupon
 * @property-read \App\Models\Order|null $order
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|CouponUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CouponUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CouponUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|CouponUser whereCouponId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CouponUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CouponUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CouponUser whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CouponUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CouponUser whereUserId($value)
 * @mixin \Eloquent
 */
class CouponUser extends Model
{
    protected $fillable = [
        "user_id",
        "coupon_id",
        "order_id",
    ];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::class, "coupon_id");
    }

    public function order()
    {
        return $this->belongsTo(Order::class, "order_id");
    }

}
