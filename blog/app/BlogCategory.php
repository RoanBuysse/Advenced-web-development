<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogCategory extends Model

{
    protected $dates = ['deleted_at'];
    protected $fillable=['nameNl', 'nameEn'];
   public function blog()
   {
    return $this->belongsToMany(News::class, 'blog_blog_categories');  
   }
}
