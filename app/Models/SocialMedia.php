<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SocialMedia
 *
 * @property int $id
 * @property string|null $image
 * @property string|null $name_ar
 * @property string|null $name_en
 * @property string|null $link
 * @property int $record_state
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $name
 * @method static \Illuminate\Database\Eloquent\Builder|SocialMedia newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialMedia newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialMedia query()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialMedia whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialMedia whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialMedia whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialMedia whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialMedia whereNameAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialMedia whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialMedia whereRecordState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialMedia whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SocialMedia extends Model
{
    protected $fillable = ['image', 'name_ar', "name_en", "link", "record_state"];

    public function getNameAttribute()
    {
        return $this->{"name_" . app()->getLocale()};
    }
}
