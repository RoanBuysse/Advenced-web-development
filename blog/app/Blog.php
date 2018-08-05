<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Blog extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'titleNl', 'bodyNl', 'titleEn', 'bodyEn', 'photo_id', 
        // (category)
    ];

    public function photo()
    {
        return $this->belongsTo(Photo::class);
    }


    public function category()
    {
        return $this->belongsToMany(BlogCategory::class, 'blog_blog_categories');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    

}
