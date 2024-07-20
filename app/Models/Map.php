<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Map extends Model
{
    protected $fillable = [
        'name'
    ];

//    public function user()
//    {
//        return $this->hasMany(User::class);
//    }

    public function posts() : BelongsToMany
    {
        return $this->belongsToMany(
            User::class,
            'values',
            'map_id',
            'post_id'
        );
    }
}
