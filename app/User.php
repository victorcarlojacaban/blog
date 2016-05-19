<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //indicates that a user can have many blogs
    public function blogs() 
    {   
        //represents the relationship between user and blogs
        return $this->hasMany(Blog::class);
    }

    public function comments() 
    {
        return $this->hasMany(Comment::class);
    }
}
