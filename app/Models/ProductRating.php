<?php

namespace App\Models;

use App\Http\Resources\NewProductsResource;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ProductRating
 *
 * @property int $id
 * @property string|null $product_id
 * @property string|null $user_id
 * @property string|null $rate
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Product|null $product
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|ProductRating newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductRating newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductRating query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductRating whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductRating whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductRating whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductRating whereRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductRating whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductRating whereUserId($value)
 * @mixin \Eloquent
 */
class ProductRating extends Model
{
    protected $fillable = [
        "product_id", "user_id", "rate"
    ];

    public function toArray()
    {
        $data["id"] = $this->id;
        $data["product"] = NewProductsResource::make($this->product);
        $data["rate"] = $this->rate;
        return $data;
    }

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function product()
    {
        return $this->belongsTo(Product::class, "product_id");
    }

}
