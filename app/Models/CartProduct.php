<?php

namespace App\Models;

use App\Http\Resources\NewProductsResource;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CartProduct
 *
 * @property int $id
 * @property string|null $user_id
 * @property string|null $cart_id
 * @property string|null $product_id
 * @property string $product_options
 * @property string|null $count
 * @property string|null $price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Cart|null $cart
 * @property-read mixed $product_options_return
 * @property-read \App\Models\Product|null $product
 * @method static \Illuminate\Database\Eloquent\Builder|CartProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CartProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CartProduct query()
 * @method static \Illuminate\Database\Eloquent\Builder|CartProduct whereCartId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartProduct whereCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartProduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartProduct whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartProduct wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartProduct whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartProduct whereProductOptions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartProduct whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartProduct whereUserId($value)
 * @mixin \Eloquent
 */
class CartProduct extends Model
{
    protected $fillable = [
        "user_id",
        "cart_id",
        "product_id",
        "count",
        "price",
        "product_options", // json
    ];

    public function toArray()
    {
        $data["id"] = $this->id;
        $data["product"] = NewProductsResource::make($this->product);
        $data["count"] = $this->count;
        $data["price"] = $this->price;
        $data["currency"] = Setting::first()->app_currency ?? "ريال";
        $data["product_options"] = $this->product_options_return;
        return $data;
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class, "cart_id");
    }

    public function product()
    {
        return $this->belongsTo(Product::class, "product_id");
    }

    public function getProductOptionsReturnAttribute()
    {
        $productOptions = $this->product_options;
        $productOptionsArray = json_decode($productOptions) ?? [];
        $data = [];
        if (count($productOptionsArray) > 0) {
            foreach ($productOptionsArray as $productOptionsArrayItem) {
                $option = ProductOption::find($productOptionsArrayItem);
                $item["option"] = $option;
                $item["price"] = $option->price;
                $data[] = $item;
            }
        }
        return $data;
    }
}
