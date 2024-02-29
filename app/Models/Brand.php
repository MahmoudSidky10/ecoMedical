<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Brand
 *
 * @property int $id
 * @property string|null $image
 * @property string|null $name_ar
 * @property string|null $name_en
 * @property int $record_state
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $products
 * @property-read int|null $products_count
 * @method static \Illuminate\Database\Eloquent\Builder|Brand newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Brand newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Brand query()
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereNameAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereRecordState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Brand extends Model
{
    protected $fillable = ['image', 'name_ar', "name_en", "record_state"];

    public function toArray()
    {
        $data['id'] = $this->id;
        $data['name'] = $this->name;
        $data['image'] = url("/") . "/" . $this->image;
        return $data;
    }

    public function getNameAttribute()
    {
        return $this->{"name_" . app()->getLocale()};
    }

    public function products()
    {
        return $this->hasMany(Product::class, "brand_id");
    }

    public function productList($number)
    {
        return Product::where("brand_id", $this->id)->take($number)->get();
    }
}
