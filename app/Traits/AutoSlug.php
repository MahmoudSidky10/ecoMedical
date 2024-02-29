<?php

namespace App\Traits;


use Illuminate\Support\Str;

trait AutoSlug
{
    public static function bootAutoSlug()
    {

        static::creating(function ($modal) {
            if ($modal->name_en) {
                $modal->slug = Str::slug($modal->name_en);
            } else {
                $modal->slug = Str::slug($modal->name_ar);
            }
        });

        static::updating(function ($modal) {
            if ($modal->name_en) {
                $modal->slug = Str::slug($modal->name_en);
            } else {
                $modal->slug = Str::slug($modal->name_ar);
            }
        });
    }
}

