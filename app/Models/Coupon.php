<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Coupon
 *
 * @property int $id
 * @property string|null $name_ar
 * @property string|null $name_en
 * @property string|null $code
 * @property string|null $discount
 * @property string|null $max_using
 * @property string|null $user_max_using
 * @property string $is_fixed 1 for discount is price  0 discount is  percentage
 * @property string|null $expires_at
 * @property string|null $starts_at
 * @property int $record_state
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read mixed $expire_date
 * @property-read mixed $name
 * @property-read mixed $start_date
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon query()
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereExpiresAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereIsFixed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereMaxUsing($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereNameAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereRecordState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereStartsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereUserMaxUsing($value)
 * @mixin \Eloquent
 */
class Coupon extends Model
{
    protected $fillable = [
        'name_ar',
        'name_en',
        'code',
        'discount',
        'max_using',
        'user_max_using',
        'is_fixed',
        'record_state',
        'starts_at',
        'expires_at'
    ];


    public function getNameAttribute()
    {
        return $this->{"name_" . app()->getLocale()};
    }

    public function getStartDateAttribute()
    {
        return date('Y-m-d', strtotime($this->starts_at));
    }

    public function getExpireDateAttribute()
    {
        return date('Y-m-d', strtotime($this->expires_at));
    }
}
