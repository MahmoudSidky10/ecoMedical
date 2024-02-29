<?php

namespace App\Traits;

use App\User;

trait UpdatedBy
{
    protected static function bootUpdatedBy()
    {
        static::updating(
            function ($model) {
                if (auth()->check()) {
                    $user = auth()->user()->id;
                    $model->updated_by = $user ? $user : null;
                }
            }
        );
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }
}
