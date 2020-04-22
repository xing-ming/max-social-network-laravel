<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    
    protected $table = 'users';

    protected $fillable = [
        'first_name',
        'email',
        'password'
    ];

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    // which post has many like from many user
    public function likes()
    {
        return $this->hasMany('App\Like');
    }
}
