<?php

namespace App\Models;

use App\Http\Resources\NewProductOptionsResource;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ProductOption
 *
 * @property int $id
 * @property string|null $product_property_id
 * @property string|null $product_id
 * @property string|null $name_ar
 * @property string|null $name_en
 * @property string|null $price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $name
 * @property-read \App\Models\Product|null $product
 * @property-read \App\Models\ProductProperty|null $productProperty
 * @method static \Illuminate\Database\Eloquent\Builder|ProductOption newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductOption newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductOption query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductOption whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductOption whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductOption whereNameAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductOption whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductOption wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductOption whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductOption whereProductPropertyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductOption whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ProductOption extends Model
{
    protected $fillable = [
        "product_property_id",
        "product_id",
        "name_ar",
        "name_en",
        "price",
    ];

    public function toArray()
    {
        $data["id"] = $this->id;
        $data["name"] = $this->name;
        $data["price"] = $this->price ?? 0;
        $data["cost"] = $this->price . " " . Setting::first()->app_currency ?? "ريال";
        $data["productProperty"] = NewProductOptionsResource::make($this->productProperty);;
        return $data;
    }


    public function getNameAttribute()
    {
        return $this->{"name_" . app()->getLocale()};
    }

    public function product()
    {
        return $this->belongsTo(Product::class, "product_id");
    }

    public function productProperty()
    {
        return $this->belongsTo(ProductProperty::class, "product_property_id");
    }


}
