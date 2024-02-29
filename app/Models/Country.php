<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Country
 *
 * @property int $id
 * @property string $is_active
 * @property string|null $code
 * @property string|null $name_ar
 * @property string|null $name_en
 * @property string|null $currency_ar
 * @property string|null $currency_en
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $currency
 * @property-read mixed $name
 * @method static \Illuminate\Database\Eloquent\Builder|Country newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Country newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Country query()
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCurrencyAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCurrencyEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereNameAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Country extends Model
{
    protected $fillable = [
        "name_ar", "name_en", "code", "is_active", "currency_ar", "currency_en"
    ];


    public function toArray()
    {
        $data["id"] = $this->id;
        $data["name"] = $this->name;
        $data["code"] = $this->code;
        $data["currency"] = $this->currency;
        return $data;
    }

    public function getNameAttribute()
    {
        return $this->{"name_" . app()->getLocale()};
    }

    public function getCurrencyAttribute()
    {
        return $this->{"currency_" . app()->getLocale()};
    }

}
