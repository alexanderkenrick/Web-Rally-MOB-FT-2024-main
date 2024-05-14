<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{

    public function result() 
    {
        return $this->hasMany(Result::class);
    }

}
