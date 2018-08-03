<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class photo extends Model
{
    protected $fillable = [
        'photo', 'title',
   ];
   public function Blog()
   {
       $this->belongsTo(Blog::class);
   }
}
