<?php

namespace App\Models;

use App\Models\Permission;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PermissionCategory
 *
 * @property int $id
 * @property string|null $name_ar
 * @property string|null $name_en
 * @property int $record_state
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $name
 * @property-read \Illuminate\Database\Eloquent\Collection|Permission[] $permissions
 * @property-read int|null $permissions_count
 * @method static \Illuminate\Database\Eloquent\Builder|PermissionCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PermissionCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PermissionCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|PermissionCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PermissionCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PermissionCategory whereNameAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PermissionCategory whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PermissionCategory whereRecordState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PermissionCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PermissionCategory extends Model
{
    protected $fillable = ['name_ar', "name_en", "record_state"];

    public function getNameAttribute()
    {
        return $this->{"name_" . app()->getLocale()};
    }

    public function permissions()
    {
        return $this->hasMany(Permission::class, 'category_id');
    }
}
