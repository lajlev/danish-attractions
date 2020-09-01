<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attraction extends Model
{
    protected $fillable = ['name', 'description', 'url_gmap', 'image'];
    
    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
