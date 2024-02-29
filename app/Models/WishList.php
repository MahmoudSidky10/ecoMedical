<?php

namespace App\Models;

use App\Http\Resources\NewProductsResource;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\WishList
 *
 * @property int $id
 * @property string|null $user_id
 * @property string|null $product_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Product|null $product
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|WishList newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WishList newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WishList query()
 * @method static \Illuminate\Database\Eloquent\Builder|WishList whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WishList whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WishList whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WishList whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WishList whereUserId($value)
 * @mixin \Eloquent
 */
class WishList extends Model
{
    protected $fillable = ["user_id", "product_id"];

    public function toArray()
    {
        $data['id'] = $this->id;
        $data['product'] = NewProductsResource::make($this->product);
        $data['created_at'] = @$this->created_at->diffforhumans();
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
