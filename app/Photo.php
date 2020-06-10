<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    protected $table = "photos";

    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function posts()
    {
        return $this->belongsToMany('App\Post')->withTimestamps();
    }
}
