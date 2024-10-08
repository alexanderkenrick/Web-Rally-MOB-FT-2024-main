<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = [
        "result"
    ];

    public function group()
    {
        return $this->belongsToMany(Group::class);
    }

    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}
