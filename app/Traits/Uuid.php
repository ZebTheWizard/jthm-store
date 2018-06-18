<?php

namespace App\Traits;

trait Uuid
{

  protected static function boot() {
    parent::boot();
    static::creating(function ($model) {
      $model->{$model->getKeyName()} = str_random(7);
    });
  }

}
