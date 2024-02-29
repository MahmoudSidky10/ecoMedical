<?php
namespace App\Traits;

use function uniqid;

trait AutoGuid
{
    protected static function bootAutoGuid()
    {
        static::creating(function ($model) {
            if(!$model->guid){
                $model->guid = uniqid();
            }
        }
        );
    }

    public function getKeyType()
    {
        return 'string';
    }
}

