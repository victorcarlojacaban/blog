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

    protected $casts = [
        'is_admin' => 'boolean',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

     /**
     * this will check for an admin column in your users table
     * @return boolean
     */

    public function isAdmin()
    {
        if ($this->is_admin) {
            return true;
        }

        return false;
    }

     /**
     * One to Many relation
     * Represents the relationship between user and blogs
     * @return Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

     /**
     * One to Many relation
     *
     * @return Illuminate\Database\Eloquent\Relations\hasMany
     */

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Scope query by name
     *
     * @param string title
     * @return Builder
     */
    public function scopeShowUser($query, $name)
    {
        $name =  str_replace('-', ' ', $name);

        return $query->where(compact(['name']));
    }
}
