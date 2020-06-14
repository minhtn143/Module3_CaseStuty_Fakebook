<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $table = "posts";

    protected $fillable = [
        'content',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo("App\User");
    }

    public function photos()
    {
        return $this->hasMany("App\Photo");
    }

    public function comments()
    {
        return $this->hasMany('App\Post', 'parent_id');
    }

    public function rep_cmts()
    {
        return $this->belongsTo('App\Post');
    }
}
