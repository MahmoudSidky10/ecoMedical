<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ProductImages
 *
 * @property int $id
 * @property string|null $product_id
 * @property string|null $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ProductImages newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductImages newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductImages query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductImages whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductImages whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductImages whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductImages whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductImages whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ProductImages extends Model
{
    protected $fillable = ["product_id", "image"];

    public function toArray()
    {
        $data["id"] = $this->id;
        $data["image"] = url("/") . "/" . $this->image;
        return $data;
    }
}
