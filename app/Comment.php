<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //Relazione tra tabella POSTS - COMMENTS
    public function post(){
        return $this->belongsTo('App\Post');
    }
}
