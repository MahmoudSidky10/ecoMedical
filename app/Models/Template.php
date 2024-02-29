<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Template
 *
 * @property int $id
 * @property string|null $name_ar
 * @property string|null $name_en
 * @property string $sort
 * @property string|null $section_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Template newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Template newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Template query()
 * @method static \Illuminate\Database\Eloquent\Builder|Template whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Template whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Template whereNameAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Template whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Template whereSectionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Template whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Template whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Template extends Model
{
    protected $fillable = [
        'name_ar', 'name_en', "sort", "section_id"
    ];
}
