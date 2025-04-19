<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['body'];

    public function commentable()
    {
        return $this->morphTo();
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id')->latest();
    }
    public function getRepliesCountAttribute()
    {
        return $this->replies()->count();
    }

    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }
    
}
