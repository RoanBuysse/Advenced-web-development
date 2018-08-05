<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model

{
    protected $dates = ['deleted_at'];
    protected $fillable=['nameNl', 'nameEn'];
   public function blog()
   {
    return $this->belongsToMany(Blog::class, 'blog_blog_categories');  
   }
}
