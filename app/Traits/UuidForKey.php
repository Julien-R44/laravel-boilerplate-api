<?php

namespace App\Traits;

use Webpatser\Uuid\Uuid;

trait UuidForKey
{
    public static function bootUuidForKey()
    {
        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Uuid::generate(4)->string;
        });
    }

    public function getCasts()
    {
        return $this->casts;
    }

    public function getKeyType()
    {
        return 'string';
    }
}
