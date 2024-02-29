<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\OrderProduct
 *
 * @property int $id
 * @property string|null $order_id
 * @property string|null $user_id
 * @property string|null $product_id
 * @property string|null $count
 * @property string|null $price
 * @property string|null $product_options
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Cart $cart
 * @property-read mixed $product_options_return
 * @property-read \App\Models\Order|null $order
 * @property-read \App\Models\Product|null $product
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct whereCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct whereProductOptions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct whereUserId($value)
 * @mixin \Eloquent
 */
class OrderProduct extends Model
{
    protected $fillable = [
        "order_id",
        "user_id",
        "product_id",
        "count",
        "price",
//        "product_options",
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, "order_id");
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
