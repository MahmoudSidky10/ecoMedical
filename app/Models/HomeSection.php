<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\HomeSection
 *
 * @property int $id
 * @property string|null $category_id
 * @property string|null $design_id
 * @property int|null $sort
 * @property int $record_state
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Design|null $design
 * @property-read \App\Models\Category|null $section
 * @method static \Illuminate\Database\Eloquent\Builder|HomeSection newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HomeSection newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HomeSection query()
 * @method static \Illuminate\Database\Eloquent\Builder|HomeSection whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomeSection whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomeSection whereDesignId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomeSection whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomeSection whereRecordState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomeSection whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomeSection whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class HomeSection extends Model
{
    protected $fillable = [
        "category_id",
        "design_id",
        "sort",
        "record_state",
    ];

    public function section()
    {
        return $this->belongsTo(Category::class, "category_id");
    }

    public function design()
    {
        return $this->belongsTo(Design::class, "design_id");
    }
}
