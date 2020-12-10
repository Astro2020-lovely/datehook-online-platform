<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DepositRequest extends Model
{
    public function user() {
      return $this->belongsTo('App\User');
    }

    public function gateway() {
      return $this->belongsTo('App\Gateway');
    }
}
