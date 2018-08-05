<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable=['bodyNl', 'bodyEn', 'blog_id', 'user_id'];
    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
}
