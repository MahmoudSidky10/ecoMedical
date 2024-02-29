<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ProductProperty
 *
 * @property int $id
 * @property string|null $name_ar
 * @property string|null $name_en
 * @property int $record_state
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $name
 * @method static \Illuminate\Database\Eloquent\Builder|ProductProperty newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductProperty newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductProperty query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductProperty whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductProperty whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductProperty whereNameAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductProperty whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductProperty whereRecordState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductProperty whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ProductProperty extends Model
{
    protected $fillable = [
        "name_ar",
        "name_en"
    ];

    public function toArray()
    {
        $data["id"] = $this->id;
        $data["name"] = $this->name;
        $data["options"] = $this->apiOptions();
        return $data;
    }

    public function getNameAttribute()
    {
        return $this->{"name_" . app()->getLocale()};
    }

    public function allOptions()
    {
        return ProductOption::where("product_property_id", $this->id)->get();
    }

    public function options($product_id)
    {
        return ProductOption::where("product_id", $product_id)->where("product_property_id", $this->id)->get();
    }

    public function apiOptions()
    {
        return ProductOption::where("product_id", request()->product_id)->where("product_property_id", $this->id)->get();
    }
}
