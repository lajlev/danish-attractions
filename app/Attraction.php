<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Attraction extends Model
{
    protected $fillable = ['name', 'description', 'lat', 'lng', 'url_gmap'];
    
    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
