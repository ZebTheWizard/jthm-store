<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use Uuid;

    protected $fillable = [
        'user_id', 'item_id',
    ];

    public $incrementing = false;

    public function item() {
      return $this->belongsTo('App\Item');
    }

    public function user() {
      return $this->belongsTo('App\User');
    }
}
