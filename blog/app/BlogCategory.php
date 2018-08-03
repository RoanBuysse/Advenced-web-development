<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    protected $fillable=['nameNl', 'nameEn'];
   public function blog()
   {
    return $this->belongsToMany(News::class, 'blog_blog_categories');  
   }
}
