<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
     /**
      * DB RELATIONS - Relazioni tra DB
      */

    //Relazione tra POSTS e TAGS (many to many)
    public function posts() {
        return $this->belongsToMany('App\Post');
    }
}
