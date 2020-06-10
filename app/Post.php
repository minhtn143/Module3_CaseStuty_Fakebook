<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $table = "posts";
    protected $fillable = [
        'body',
        'user_id'
    ];


    public function user()
    {
        return $this->belongsTo("App\User",'user_id');
    }

    public function photos()
    {
        return $this->belongsToMany("App\Photo")->withTimestamps();
    }

    public function scopeNotReply($query)
    {
        return $query->whereNull('parent_id');
    }

    public function replies()
    {
        return $this->hasMany('App\Post', 'parent_id');
    }

    public function likes()
    {
        return $this->morphMany('App\Like', 'likeable');
    }


    public function comments()
    {
        return $this->hasMany('App\Post', 'parent_id');
    }
}

