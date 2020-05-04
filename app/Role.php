<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = "role";
    protected $primaryKey = "roleId";
    public function users()
    {
        return $this->hasMany('App\User');
    }
}
