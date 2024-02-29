<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;


    protected $hidden = [
        'password', 'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $fillable = [
        'fire_base_token',
        'user_type_id',
        'user_verify',
        'email',
        'password',
        'mobile',
        'name',
        'record_state',
    ];


    protected static function boot()
    {
        parent::boot();

//        static::addGlobalScope('record_state', function (Builder $builder) {
//            $builder->where('record_state', '1');
//        });
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function address()
    {
        return $this->hasMany(ClientAddress::class, "user_id");
    }


    public function wishListCount()
    {
        return WishList::where("user_id", $this->id)->count();
    }

    public function compareListCount()
    {
        return Compare::where("user_id", $this->id)->count();
    }

    public function cartListCount()
    {
        return CartProduct::where("user_id", $this->id)->count();
    }

    public function cartListTotalPrice()
    {
        $items = CartProduct::where("user_id", $this->id)->get();
        $sum = 0;
        foreach ($items as $item) {
            $sum += $item->count * $item->price;
        }
        return $sum;
    }

    public function checkCartProduct($product_id)
    {
        $check = CartProduct::where("user_id", $this->id)->where("product_id", $product_id)->first();
        if ($check) {
            return true;
        } else {
            return false;
        }
    }

    public function accessTokens()
    {
        return $this->hasMany('App\OauthAccessToken');
    }

}
