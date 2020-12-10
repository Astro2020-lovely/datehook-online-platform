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
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function images() {
      return $this->hasMany('App\Image');
    }

    public function deposits() {
      return $this->hasMany('App\Deposit');
    }

    public function transactions() {
      return $this->hasMany('App\Transaction');
    }
}
