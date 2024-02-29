<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Slider
 *
 * @property int $id
 * @property string|null $image
 * @property string|null $name_ar
 * @property string|null $name_en
 * @property string|null $link
 * @property int $record_state
 * @property int $page_place
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $name
 * @method static \Illuminate\Database\Eloquent\Builder|Slider newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Slider newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Slider query()
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereNameAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider wherePagePlace($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereRecordState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Slider extends Model
{
    protected $fillable = ['image', 'name_ar', "name_en", "link", "record_state", "page_place"];

    public function toArray( )
    {
        $data['id'] = $this->id;
        $data['name'] = $this->name;
        $data['image'] = url("/") . "/" . $this->image;
        $data['link'] = $this->link;
        return $data;
    }

    public function getNameAttribute()
    {
        return $this->{"name_" . app()->getLocale()};
    }

    public function placeName()
    {
        if ($this->page_place == 1) {
            return __("language.top");
        } elseif ($this->page_place == 2) {
            return __("language.mid");
        } elseif ($this->page_place == 3) {
            return __("language.down");
        } else {
            return __("language.top");
        }
    }
}
