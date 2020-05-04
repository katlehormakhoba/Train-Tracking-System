<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $table = "card";
    protected $primaryKey = "cardId";

    public function passenger()
    {
        return $this->belongsTo('App\Passenger', 'passengerId');
    }
}
