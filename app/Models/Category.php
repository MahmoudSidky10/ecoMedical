<?php

namespace App\Models;

use App\Traits\AutoSlug;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Category
 *
 * @property int $id
 * @property string|null $parent_id
 * @property string|null $slug
 * @property string|null $image
 * @property string|null $icon
 * @property string|null $name_ar
 * @property string|null $name_en
 * @property int $record_state
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|Category[] $childCategories
 * @property-read int|null $child_categories_count
 * @property-read mixed $name
 * @property-read Category|null $parent
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereNameAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereRecordState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Category extends Model
{
    use AutoSlug;

    protected $fillable = ['parent_id', 'slug', 'icon', 'image', 'name_ar', "name_en", "record_state"];

    public function getNameAttribute()
    {
        return $this->{"name_" . app()->getLocale()};
    }

    public function childCategories()
    {
        return $this->hasMany(Category::class, "parent_id");
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, "parent_id");
    }

    public function latestTenProducts()
    {
        $categorySubs = Category::where("parent_id", $this->id)->pluck("id")->unique()->toArray();
        array_push($categorySubs, $this->id);
        array_unique($categorySubs);
        $products = Product::whereIn("category_id", $categorySubs)->orderBy("id", "desc")->take(10)->get();
        return $products;
    }

    public function productCount()
    {
        $categorySubs = Category::where("parent_id", $this->id)->pluck("id");
        return Product::whereIn("category_id", $categorySubs)->count();
    }

    public function latestQueryProducts()
    {
        $categorySubs = Category::where("parent_id", $this->id)->pluck("id");
        return Product::whereIn("category_id", $categorySubs);
    }
}
