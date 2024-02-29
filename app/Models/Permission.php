<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Permission
 *
 * @property int $id
 * @property int $record_state
 * @property string|null $name_ar
 * @property string|null $name_en
 * @property string|null $title
 * @property int|null $category_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\PermissionCategory|null $category
 * @property-read mixed $name
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newQuery()
 * @method static \Illuminate\Database\Query\Builder|Permission onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission query()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereNameAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereRecordState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Permission withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Permission withoutTrashed()
 * @mixin \Eloquent
 */
class Permission extends Model
{
    use SoftDeletes;


    public $table = 'permissions';
    public $perPage = 15;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'record_state',
        'name_ar',
        'name_en',
        'title',
        'created_at',
        'updated_at',
        'deleted_at',
        'category_id',
    ];

    public function getNameAttribute()
    {
        return $this->{"name_" . app()->getLocale()};
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function category()
    {
        return $this->belongsTo(PermissionCategory::class, 'category_id');
    }
}
