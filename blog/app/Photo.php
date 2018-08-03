<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class photo extends Model
{

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'photo', 'title',
   ];
   public function Blog()
   {
       $this->belongsTo(Blog::class);
   }
}
