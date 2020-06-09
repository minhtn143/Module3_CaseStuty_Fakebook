<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $table = "posts";

    public function user()
    {
        $this->belongsTo("App\User");
    }

    public function photos()
    {
        $this->belongsToMany("App\Photo");
    }
}
