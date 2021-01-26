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
}