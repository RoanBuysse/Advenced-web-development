<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
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
        return $this->belongsToMany(BlogCategory::class, 'blog_blog_category');
    }

}
