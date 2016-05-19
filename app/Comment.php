<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'blog_id',
       'content',
    ];

    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    public function blog() 
    {
        return $this->belongsTo(Blog::class);
    }
}
