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
        return $this->hasMany('App\Models\Post', 'parent_id');
    }

    public function likes()
    {
        return $this->morphMany('App\Models\Like', 'likeable');
    }
}
