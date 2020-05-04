<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = "ticket";
    protected $primaryKey = "ticketId";
    public function passenger()
    {
        return $this->belongsTo('App\Passenger', "passengerId");
    }

    public function train()
    {
        return $this->belongsTo('App\Train', "trainId");
    }
}
