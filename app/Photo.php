<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model



{


     protected $fillable = ['title', 'photo', 'image'];
    //
     public function blog()
    {
        $this->belongsTo(Blog::class);
    }

}
