<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ClientAddress
 *
 * @property int $id
 * @property string|null $user_id
 * @property string|null $country_id
 * @property string|null $governorate_id
 * @property string|null $street
 * @property string|null $building_number
 * @property string|null $postal_code
 * @property string|null $floor
 * @property string|null $room
 * @property string|null $landmark
 * @property string|null $additional_information
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Country|null $country
 * @property-read \App\Models\Governorate|null $governorate
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|ClientAddress newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClientAddress newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClientAddress query()
 * @method static \Illuminate\Database\Eloquent\Builder|ClientAddress whereAdditionalInformation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientAddress whereBuildingNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientAddress whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientAddress whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientAddress whereFloor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientAddress whereGovernorateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientAddress whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientAddress whereLandmark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientAddress wherePostalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientAddress whereRoom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientAddress whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientAddress whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientAddress whereUserId($value)
 * @mixin \Eloquent
 */
class ClientAddress extends Model
{
    protected $fillable = [
        "user_id",
        "country_id",
        "governorate_id",
        "street",
        "building_number",
        "postal_code",
        "floor",
        "room",
        "landmark",
        "additional_information",
    ];

    public function toArray()
    {
        $data["id"] = $this->id;
        $data["country_id"] = $this->country_id;
        $data["country"] = @$this->country->name;
        $data["governorate_id"] = $this->governorate_id;
        $data["governorate"] = @$this->governorate->name;
        $data["street"] = @$this->street;
        return $data;
    }

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function country()
    {
        return $this->belongsTo(Country::class, "country_id");
    }

    public function governorate()
    {
        return $this->belongsTo(Governorate::class, "governorate_id");
    }

}
