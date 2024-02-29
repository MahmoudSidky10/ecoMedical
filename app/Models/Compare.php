<?php

namespace App\Models;

use App\Http\Resources\NewProductsResource;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Compare
 *
 * @property int $id
 * @property string|null $user_id
 * @property string|null $product_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Product|null $product
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Compare newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Compare newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Compare query()
 * @method static \Illuminate\Database\Eloquent\Builder|Compare whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Compare whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Compare whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Compare whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Compare whereUserId($value)
 * @mixin \Eloquent
 */
class Compare extends Model
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
