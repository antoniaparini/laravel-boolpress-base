<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoPost extends Model
{
    
    /**
     * Mass Assignment with Fill
     */
    
    protected $fillable = [
        'post_id',
        'post_status',
        'comment_status'
    ];

    //Dobbiamo disabilitare i TimeStamp per questa tabella
    public $timestamps = false;
    
         /**
      * DB RELATIONS - Relazioni tra DB
      */

      //Relazione tra tabella POSTS - INFO_POSTS
      public function post(){
        return $this->belongsTo('App\Post');
    }
}
