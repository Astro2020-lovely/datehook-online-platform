<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    protected $table = 'deposits';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function gateway()
    {
        return $this->belongsTo('App\Gateway');
    }
}
