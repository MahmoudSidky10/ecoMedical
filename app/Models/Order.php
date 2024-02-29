<?php

namespace App\Models;

use App\Http\Resources\NewProductsResource;
use App\Http\Resources\OrderProductsResource;
use App\Traits\AutoGuid;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Order
 *
 * @property string $id
 * @property string|null $guid
 * @property string|null $user_id
 * @property string|null $governorate_id
 * @property string|null $subtotal
 * @property string|null $total
 * @property string|null $delivery_cost
 * @property string|null $coupon_id
 * @property string $status
 * @property string $coupon_discount
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\ClientAddress|null $address
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OrderProduct[] $products
 * @property-read int|null $products_count
 * @property-read \App\Models\User|null $user
 * @method static Builder|Order newModelQuery()
 * @method static Builder|Order newQuery()
 * @method static Builder|Order query()
 * @method static Builder|Order whereCouponDiscount($value)
 * @method static Builder|Order whereCouponId($value)
 * @method static Builder|Order whereCreatedAt($value)
 * @method static Builder|Order whereDeliveryCost($value)
 * @method static Builder|Order whereGovernorateId($value)
 * @method static Builder|Order whereGuid($value)
 * @method static Builder|Order whereId($value)
 * @method static Builder|Order whereStatus($value)
 * @method static Builder|Order whereSubtotal($value)
 * @method static Builder|Order whereTotal($value)
 * @method static Builder|Order whereUpdatedAt($value)
 * @method static Builder|Order whereUserId($value)
 * @mixin \Eloquent
 */
class Order extends Model
{
    use autoGuid;

    const PENDING = 0;
    const ACCEPTED = 1;
    const DELIVERY = 2;
    const REJECTED = 3;
    const Done = 4;
    const ISSUE = 5;

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('id', 'desc');
        });
    }

    protected $fillable = [
        "guid",
        "user_id",
        "governorate_id",
        "subtotal",
        "total",
        "delivery_cost",
        "coupon_id",
        "status",
        "coupon_discount",
    ];

    public function toArray()
    {
        $data["id"] = $this->id;
        $data["guid"] = $this->guid;
        $data["address"] = $this->address;
        $data["delivery_cost"] = $this->delivery_cost;
        $data["subtotal"] = $this->subtotal;
        $data["total"] = $this->total;
        $data["products"] = OrderProductsResource::collection($this->products);
        $data["time"] = $this->created_at->format("d M Y");
        $data["status"] = $this->productStatus();
        return $data;
    }

    public function productsList()
    {
        $ids = OrderProduct::where("order_id", $this->id)->pluck("product_id");
        return Product::whereIn("id", $ids)->get();
    }

    public function productStatus()
    {
        if ($this->status == 0) {
            return "قيد المراجعه والتنفيذ";
        }

        if ($this->status == 1) {
            return "تم الموافقه علي الطلب";
        }

        if ($this->status == 2) {
            return "جاري توصيل الطلب اليك";
        }

        if ($this->status == 3) {
            return "تم رفض الطلب من النظام ";
        }

        if ($this->status == 4) {
            return "تم الانتهاء من الطلب";
        }

        if ($this->status == 5) {
            return "حدثت مشكله اثناء التوصيل";
        }
    }

    public function products()
    {
        return $this->hasMany(OrderProduct::class, "order_id");
    }

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function address()
    {
        return $this->belongsTo(ClientAddress::class, "governorate_id");
    }
}
