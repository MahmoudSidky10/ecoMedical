<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Setting
 *
 * @property int $id
 * @property string|null $app_name
 * @property string|null $app_logo
 * @property string|null $app_description
 * @property string|null $app_color
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting query()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereAppColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereAppDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereAppLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereAppName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Setting extends Model
{
    protected $fillable = [
        "app_name",
        "app_logo",
        "app_color",
        "app_currency",
        "app_description",
        "delivery_min_price", // if product price is less than this value , it will be free
    ];

    public function toArray()
    {
        $data["appName"] = $this->app_name;
        $data["appLogo"] = url("/") . "/" . $this->app_logo;
        $data["appColor"] = $this->app_color ?? "#42a4e8";
        $data["appDescription"] = $this->app_description;
        return $data;
    }
}
