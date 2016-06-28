<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'content',
    ];

    /**
     * One to Many relation
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
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
     * One to Many relation
     *
     * @return Illuminate\Database\Eloquent\Relations\hasMany
     */

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

     /**
     * Scope query by title
     *
     * @param string title
     * @return Builder
     */
    public function scopeShowBlog($query, $title)
    {
        $title =  str_replace('-', ' ', $title);

        return $query->where(compact(['title']));
    }

     /**
     * Scope query by id
     *
     * @param string title
     * @return Builder
     */
    public function scopeShowBlogById($query, $id)
    {
        return $query->where(compact(['id']));
    }
}
