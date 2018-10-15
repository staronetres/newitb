<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model



{



  protected $uploads = '/images/';



    // protected $fillable = ['file'];
    //
    use SoftDeletes;
    protected $dates = ['deleted_at'];

     protected $fillable = ['title', 'body', 'image', 'file', 'photo_id'];


      public function category()
    {
        return $this->belongsToMany(Category::class);
    }


     public function photo()
    {
        return $this->belongsTo(Photo::class);
    }

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
