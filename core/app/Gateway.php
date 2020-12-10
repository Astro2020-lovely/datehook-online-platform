<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gateway extends Model
{
    public function deposit()
    {
    	return $this->hasMany('App\Deposit','id','gateway_id');
    }

    public function depositrequests() {
      return $this->hasMany('App\DepositRequest');
    }
}
