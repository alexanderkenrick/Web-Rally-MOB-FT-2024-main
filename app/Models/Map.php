<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class Map extends Model
{
    public function user()
    {
        return $this->hasMany(User::class);
    }
}
