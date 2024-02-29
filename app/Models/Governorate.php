<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Governorate
 *
 * @property int $id
 * @property string $is_active
 * @property string|null $country_id
 * @property string|null $name_ar
 * @property string|null $name_en
 * @property int $delivery_cost
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Country|null $country
 * @property-read mixed $name
 * @method static \Illuminate\Database\Eloquent\Builder|Governorate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Governorate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Governorate query()
 * @method static \Illuminate\Database\Eloquent\Builder|Governorate whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Governorate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Governorate whereDeliveryCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Governorate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Governorate whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Governorate whereNameAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Governorate whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Governorate whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Governorate extends Model
{
    protected $fillable = [
        "delivery_cost",
        "country_id",
        "name_ar",
        "name_en",
        "is_active"
    ];

    public function toArray()
    {
        $data["id"] = $this->id;
        $data["country_id"] = $this->country_id;
        $data["name"] = $this->name;
        $data["delivery_cost"] = $this->delivery_cost;
        return $data;
    }

    public function country()
    {
        return $this->belongsTo(Country::class, "country_id");
    }

    public function getNameAttribute()
    {
        return $this->{"name_" . app()->getLocale()};
    }
}
