<?php

namespace App;

use App\Models\Group;
use App\Models\Map;
use App\Models\Result;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use Notifiable;

    public function map()
    {
        return $this->belongsTo(Map::class);
    }

    public function result()
    {
        return $this->hasMany(Result::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'password',
        'target',
        'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function maps() : BelongsToMany
    {
        return $this->belongsToMany(
            Map::class,
            'values',
            'post_id',
            'map_id'
        )
            ->withTimestamps();
    }

    public function groups() : BelongsToMany
    {
        return $this->belongsToMany(
            Group::class,
            'results',
            'post_id',
            'group_id'
        )
            ->withPivot(['result'])
            ->withTimestamps();
    }

}
