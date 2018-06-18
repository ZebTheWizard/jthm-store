<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function cart() {
      return $this->hasMany('App\Cart');
    }

    public function cartCount() : int {
      $totalQuantity = 0;
      $cart = $this->cart;
      foreach($cart as $item) {
        $totalQuantity += $item->quantity;
      }
      return $totalQuantity;
    }
}
