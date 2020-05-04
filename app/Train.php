<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Train extends Model
{
    protected $table = "train";
    protected $primaryKey = "trainId";
    public function tickets()
    {
        return $this->hasMany('App\Ticket');
    }
}
