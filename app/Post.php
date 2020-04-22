<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'body'
    ];
    
    // which user have the post
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // which post has the like
    public function likes()
    {
        return $this->hasMany('App\Like');
    }
}
