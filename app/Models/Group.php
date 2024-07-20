<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Group extends Model
{

    protected $fillable = [
        'number'
    ];

    public function result()
    {
        return $this->hasMany(Result::class);
    }

    public function posts() : BelongsToMany
    {
        return $this->belongsToMany(
            User::class,
            'results',
            'group_id',
            'post_id'
        )
            ->withPivot(['result'])
            ->withTimestamps();
    }

}
