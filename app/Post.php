<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $table = "posts";

    public function user()
    {
        return $this->belongsTo("App\User");
    }

    public function photos()
    {
        return $this->belongsToMany("App\Photo")->withTimestamps();
    }

    public function comments()
    {
        return $this->hasMany('App\Post', 'parent_id');
    }
}