<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * Mass Assignment with Fill
     */

     protected $fillable = [
         'title',
         'body',
         'slug',
         'img_path'
     ];

     /**
      * DB RELATIONS - Relazioni tra DB
      */

      //Relazione tra tabella POSTS - INFO_POSTS
      public function infoPost() {
          return $this->hasOne('App\InfoPost');
      }

      //Relazione tra tabella POSTS - COMMENTS
      public function comments() {
          return $this->hasMany('App\Comment');
      }

      //Relazione tra POSTS e TAGS (many to many)
      public function tags() {
          return $this->belongsToMany('App\Tag');
      }
}