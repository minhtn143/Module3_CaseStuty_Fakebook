<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    //
    protected $fillable = ['user_id', 'post_id'];
    protected $table = "likes";
    protected $fillable = [
        'user_id',
    ];

    public function likeable()
    {
        return $this->morphTo();
    }

    public function likeable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}