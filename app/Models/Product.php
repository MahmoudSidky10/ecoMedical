<?php

namespace App\Models;

use App\Traits\AutoSlug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * App\Models\Product
 *
 * @property int $id
 * @property string|null $brand_id
 * @property string|null $category_id
 * @property string|null $slug
 * @property int $record_state
 * @property string|null $name_ar
 * @property string|null $name_en
 * @property string|null $model_number
 * @property float|null $price
 * @property float|null $price_sale
 * @property string|null $delivery_time
 * @property string $stock_quantity
 * @property int|null $warranty_years
 * @property int $is_hot_product
 * @property int $is_deal_product
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Brand|null $brand
 * @property-read \App\Models\Category|null $category
 * @property-read mixed $category_name
 * @property-read mixed $cost
 * @property-read mixed $image
 * @property-read mixed $name
 * @property-read mixed $rate
 * @property-read mixed $sale_cost
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProductImages[] $images
 * @property-read int|null $images_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProductOption[] $options
 * @property-read int|null $options_count
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDeliveryTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereIsDealProduct($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereIsHotProduct($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereModelNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereNameAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePriceSale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereRecordState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereStockQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereWarrantyYears($value)
 * @mixin \Eloquent
 */
class Product extends Model
{
    use AutoSlug;

    public $perPage = 10;
    protected $fillable = [
        "slug",
        "name_ar",
        "name_en",
        "description",
        "model_number",
        "price",
        "price_sale",
        "delivery_time",
        "record_state",
        "stock_quantity",
        "warranty_years",
        "is_hot_product",
        "is_deal_product",
        "brand_id",
        "category_id",
        "is_vat_included", // 0- not included, 1- included
    ];

    public function images()
    {
        return $this->hasMany(ProductImages::class, "product_id");
    }

    public function options()
    {
        return $this->hasMany(ProductOption::class, "product_id");
    }

    public function getNameAttribute()
    {
        return $this->{"name_" . app()->getLocale()};
    }

    public function getCategoryNameAttribute()
    {
        return $this->category->name . " / " . $this->category->parent->name;
    }

    public function getImageAttribute()
    {
        return @ProductImages::where("product_id", $this->id)->first()->image;
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, "brand_id");
    }

    public function category()
    {
        return $this->belongsTo(Category::class, "category_id");
    }

    public function checkWishList()
    {
        if (Auth::check()) {
            $item = WishList::where("user_id", Auth::id())->where("product_id", $this->id)->first();
            if ($item) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function checkCompareList()
    {
        if (Auth::check()) {
            $item = Compare::where("user_id", Auth::id())->where("product_id", $this->id)->first();
            if ($item) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function getCostAttribute()
    {
        return $this->price . " " . Setting::first()->app_currency ?? "ريال";
    }

    public function getSaleCostAttribute()
    {
        return $this->price_sale . " " . Setting::first()->app_currency ?? "ريال";
    }

    public function SalePercentage()
    {
        if ($this->price_sale && $this->price_sale < $this->price) {
            return (int)((($this->price - $this->price_sale) / $this->price) * 100) . "%";
        } else {
            return 0;
        }
    }

    public function isFavourite()
    {
        if (Auth::guard("api")->user()) {
            $checkFav = WishList::where('user_id', Auth::guard("api")->user()->id)
                ->where('product_id', $this->id)->first();
            if ($checkFav) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function isInCart()
    {
        if (Auth::guard("api")->user()) {
            $checkFav = CartProduct::where('user_id', Auth::guard("api")->user()->id)
                ->where('product_id', $this->id)->first();
            if ($checkFav) {
                return (int)$checkFav->count;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

    public function isInCompare()
    {
        if (Auth::guard("api")->user()) {
            $checkFav = Compare::where('user_id', Auth::guard("api")->user()->id)
                ->where('product_id', $this->id)->first();
            if ($checkFav) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function optionsList()
    {
        $productPropertiesIds = ProductOption::where("product_id", $this->id)->pluck("product_property_id")->unique();
        return ProductProperty::whereIn("id", $productPropertiesIds)->get();
    }

    public function getRateAttribute()
    {
        $rate_count = ProductRating::where("product_id", $this->id)->count();
        if ($rate_count == 0) {
            return 0;
        }
        $rate_sum = ProductRating::where("product_id", $this->id)->sum("rate");
        return ($rate_sum / $rate_count);
    }

}
