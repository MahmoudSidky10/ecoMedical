<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

/**
 * App\Models\RoleUser
 *
 * @property int $id
 * @property int $user_id
 * @property int $role_id
 * @property-read \App\Models\Role $role
 * @method static \Illuminate\Database\Eloquent\Builder|RoleUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RoleUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RoleUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|RoleUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoleUser whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoleUser whereUserId($value)
 * @mixin \Eloquent
 */
class RoleUser extends Model
{

    public $table = 'role_user';
    public $timestamps = false;

    /*
     1 - الاداره
    11 - أخصائي التفتيش
    12 - مسؤول اللجنة
    13 - أمين الافلاس
    14 - موظف المحكمة
    15 - موظف تصفيه أداريه
    16 - موظف جهة ذات علاقة
    20 - مدين / وكيل المدين
     */

    protected $fillable = [
        'user_id',
        'role_id',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, "role_id");
    }

}
