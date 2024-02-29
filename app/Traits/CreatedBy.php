<?php

namespace App\Traits;

use App\User;

trait CreatedBy
{
    protected static function bootCreatedBy()
    {
        static::creating(
            function ($model) {
                if (auth()->check()) {
                    $user = auth()->user()->id;
                    $model->created_by = $user ? $user : null;
                }
            }
        );
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
