<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    // which user like or dislike the post
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // which post has the like
    // which user like it
    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}
