<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

/**
 * App\Models\Role
 *
 * @property int $id
 * @property string|null $title_ar
 * @property string|null $title_en
 * @property int $record_state
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read mixed $record_state_name
 * @property-read mixed $title
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Query\Builder|Role onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereRecordState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereTitleAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereTitleEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Role withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Role withoutTrashed()
 * @mixin \Eloquent
 */
class Role extends Model
{
    use SoftDeletes;

    public const ADMIN_ROLE = 1;
    public const USER_ROLE = 2;

    public $table = 'roles';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'record_state',
        'title_ar',
        'title_en',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getTitleAttribute()
    {
        return $this->{"title_" . app()->getLocale()};
    }

    public function getRecordStateNameAttribute()
    {
        if ($this->record_state == 1) {
            return __("language.actived");
        } else {
            return __("language.not_actived");
        }
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function usersCount()
    {
        return DB::table("role_user")->where("role_id", $this->id)->count();
    }

}
