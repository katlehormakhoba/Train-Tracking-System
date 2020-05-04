<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    protected $table = "passenger";
    protected $primaryKey = "passengerId";

    public function user()
    {
        return $this->belongsTo('App\User', 'userId');
    }

    public function cards()
    {
        return $this->hasMany('App\Card');
    }
    public function tickets()
    {
        return $this->hasMany('App\Ticket');
    }
}

?>
