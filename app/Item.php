<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
  use Uuid;
  public $incrementing = false;
}
